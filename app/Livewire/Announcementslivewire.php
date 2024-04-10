<?php

namespace App\Livewire;

use App\Models\Announcements;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Announcements')]
class Announcementslivewire extends Component
{
    public $title, $message, $selectedID;
    public function render()
    {
        $announcements = Announcements::latest()->get();
        return view('livewire.announcements.announcements-livewire')->with('announcements', $announcements);
    }

    public function add()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'message' => 'required|string'
        ]);

        Announcements::create($validated);
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function getData($id)
    {
        $this->selectedID = $id;

        $announcement = Announcements::find($id);
        $this->title = $announcement->title;
        $this->message = $announcement->message;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'message' => 'required|string'
        ]);

        Announcements::find($this->selectedID)->update($validated);
        
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function delete($id)
    {
        Announcements::find($id)->delete();
    }

    public function resets()
    {
        $this->reset('title', 'message');
        $this->resetErrorBag();
    }
}
