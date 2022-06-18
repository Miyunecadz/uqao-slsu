<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileManager extends Component
{
    use WithFileUploads;

    public $currentDirectory = 'public';
    public $directories;
    public $files;
    public $master_key;
    public $filters;
    public $searchName;
    public $selected;

    public $previousDirectory;

    public $directoryName;
    public $fileUpload;

    public $onDeleteStateName;
    public $onDeleteStateType;


    private function generateFilter()
    {
        $filteredFiles = Storage::allFiles('public');
        $filteredDirectories = Storage::allDirectories('public');
        $this->filters = array_merge($filteredFiles, $filteredDirectories);
    }

    public function mount()
    {
        $this->directories = Storage::directories($this->currentDirectory);
        $this->files = Storage::files($this->currentDirectory);

        $this->generateFilter();

        $this->generatePaths();
    }

    public function saveFile()
    {
        $this->validate([
            'fileUpload' => 'required'
        ],[
            'fileUpload.required' => 'Need to upload some file',
        ]);

        Storage::putFileAs($this->currentDirectory.'/', $this->fileUpload, $this->fileUpload->getClientOriginalName());
        $this->mount();
        $this->close('modal-upload-file');
    }

    public function close($modalName)
    {
        $this->dispatchBrowserEvent('modalDismiss', ['modalName' => $modalName]);
    }

    private function generatePaths()
    {
        $path = explode('/', $this->currentDirectory);
        array_splice($path, count($path) - 1, 1);
        $newPath = implode("/", $path);
        $this->previousDirectory = $newPath == '' ? 'public' : $newPath;
        $this->selected = "";
    }

    public function deleteState($name, $type)
    {
        $this->onDeleteStateName = $name;
        $this->onDeleteStateType = $type;
    }

    public function deleteConfirm()
    {
        $this->validate([
            'master_key' => 'required'
        ]);

        $fileContent = file_get_contents(Storage::path('master_key.txt'));
        if($this->master_key != trim($fileContent, "\n"))
        {
            $this->master_key = '';
            return $this->setErrorBag(['master_key' => 'Invalid Master Key']);
        }

        if($this->onDeleteStateType == "directory")
        {
            Storage::deleteDirectory($this->onDeleteStateName);
        }else{
            Storage::delete($this->onDeleteStateName);
        }
        $this->master_key = '';
        $this->resetErrorBag();
        $this->close('modal-delete');
        $this->reset(['onDeleteStateName', 'onDeleteStateType']);
        $this->mount();
    }

    public function createDirectory()
    {
        $this->validate([
            'directoryName' => 'required'
        ],[
            'directoryName.required' => 'Directory name is required!'
        ]);

        Storage::makeDirectory($this->currentDirectory.'/'.$this->directoryName);

        $this->close('modal-new-directory');
        $this->mount();
    }

    public function open($filename)
    {
        $path = Storage::url($filename);
        return $path;
    }

    public function download($fileName)
    {
        return Storage::download($fileName);
    }

    public function setDirectory($directory)
    {
        $this->currentDirectory = $directory;
        $this->mount();
    }

    public function getDirectory($path)
    {
        $paths = explode('/', $path);
        array_splice($paths, count($paths) - 1, 1);
        $newPath = implode("/", $paths);
        $this->setDirectory($newPath);

        $this->selected = $path;

        $this->close('modal-search-file-directory');
    }

    public function updatedSearchName()
    {
        $this->generateFilter();
        $filtered = [];
        foreach($this->filters as $filter)
        {
            if(str_contains(strtolower(basename($filter)), strtolower($this->searchName)) && !str_contains(strtolower(basename($filter)), ".gitignore"))
            {
                array_push($filtered, $filter);
            }
        }

        $this->filters = $filtered;
    }

    public function render()
    {
        return view('livewire.file-manager')
            ->extends('layouts.app');
    }
}
