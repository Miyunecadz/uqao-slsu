<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FileManager extends Component
{

    public $currentDirectory = 'public';
    public $directories;
    public $files;

    public $previousDirectory;

    public $directoryName;

    public function mount()
    {
        $this->directories = Storage::directories($this->currentDirectory);
        $this->files = Storage::files($this->currentDirectory);
        $this->generatePaths();
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

    public function createDirectory()
    {
        $this->validate([
            'directoryName' => 'required'
        ],[
            'directoryName.required' => 'Directory name is required!'
        ]);

        Storage::makeDirectory($this->currentDirectory.'/'.$this->directoryName);

        if(env('DEMO'))
        {
            $fileName = '.gitignore';
            Storage::copy('public/' . $fileName, $this->currentDirectory.'/'.$this->directoryName);
        }
        $this->close('modal-new-directory');
        $this->mount();
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
