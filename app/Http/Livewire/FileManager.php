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

    public $previousDirectory;

    public $directoryName;
    public $fileUpload;

    public $onDeleteStateName;
    public $onDeleteStateType;

    public function mount()
    {
        $this->directories = Storage::directories($this->currentDirectory);
        $this->files = Storage::files($this->currentDirectory);
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
        $this->close('modal-upload-file');
        $this->mount();
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
    }

    public function deleteState($name, $type)
    {
        $this->onDeleteStateName = $name;
        $this->onDeleteStateType = $type;
    }

    public function deleteConfirm()
    {
        if($this->onDeleteStateType == "directory")
        {
            Storage::deleteDirectory($this->onDeleteStateName);
        }else{
            Storage::delete($this->onDeleteStateName);
        }
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

    public function download($fileName)
    {
        return Storage::download($fileName);
    }

    public function setDirectory($directory)
    {
        $this->currentDirectory = $directory;
        $this->mount();
    }

    public function render()
    {
        return view('livewire.file-manager')
            ->extends('layouts.app');
    }
}
