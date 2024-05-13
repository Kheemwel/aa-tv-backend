<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.login')]
class LoginLivewire extends Component
{
    public $username, $password;
    public $error_message;

    public function render()
    {
        return view('livewire.login.login-livewire');
    }

    public function login() {
        $credentials = $this->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ]);

        if (Auth::attempt($credentials)) {
            $this->dispatch('loginSuccess');
            return redirect()->intended('games');
        } else {
            $this->error_message = 'Incorrect username or password';
        }
    }
}
