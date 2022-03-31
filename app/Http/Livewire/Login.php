<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $passcode;
    public $errorCredential;

    public function authenticate()
    {
        $credentials = ['username' => $this->username, 'password' => $this->passcode];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->to(route('dashboard'));
        }

        $this->passcode = "";
        return $this->errorCredential = "Invalid Credentials";
    }

    public function render()
    {
        return view('livewire.login')
                ->extends('layouts.guest');
    }
}
