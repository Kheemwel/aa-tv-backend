<?php

namespace App\Livewire;

use App\Models\GameData;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Main')]
class MainLivewire extends Component
{
    public function render()
    {
        $gameData = GameData::orderBy('date_time', 'desc')->get();
        return view('livewire.main-livewire', ['gameData' => $gameData]);
    }
}
