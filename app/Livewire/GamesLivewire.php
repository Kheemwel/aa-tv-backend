<?php

namespace App\Livewire;

use App\Models\GameData;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Games')]
class GamesLivewire extends Component
{
    public function render()
    {
        $gameData = GameData::orderBy('date_time', 'desc')->get();
        return view('livewire.games.games-livewire', ['gameData' => $gameData]);
    }

    public function delete($id)
    {
        GameData::find($id)->delete();
    }
}
