<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TopBarLivewire extends Component
{
    public function render()
    {
        return view('livewire.topbar.topbar-livewire');
    }

    public function logout() {
        Auth::logout();
        redirect('/');
    }
}
