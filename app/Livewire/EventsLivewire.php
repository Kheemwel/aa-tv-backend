<?php

namespace App\Livewire;

use App\Models\Events;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Events')]
class EventsLivewire extends Component
{
    public $title, $description, $event_start, $event_end, $selectedID;
    public function render()
    {
        $events = Events::orderBy('event_start')->get();
        return view('livewire.events.events-livewire')->with('events', $events);
    }

    
    public function add()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'event_start' => 'required|date|after_or_equal:today',
            'event_end' => 'required|date|after:event_start',
        ],
        [
            'event_start.required' => 'Please enter the schedule of the start of event',
            'event_start.after_or_equal' => 'The start of event should be today or next day',
            'event_end.required' => 'Please enter the schedule of the end of event',
            'event_end.after' => 'The end of event should be after the date of the start of event',
        ]
    );

        Events::create($validated);
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function getData($id)
    {
        $this->selectedID = $id;

        $event = Events::find($id);
        $this->title = $event->title;
        $this->description = $event->description;
        $this->event_start = $event->event_start;
        $this->event_end = $event->event_end;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'event_start' => 'required|date|after_or_equal:today',
            'event_end' => 'required|date|after:event_start',
        ]);

        Events::find($this->selectedID)->update($validated);
        
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function delete($id)
    {
        Events::find($id)->delete();
    }

    public function resets()
    {
        $this->reset('title', 'description', 'event_start', 'event_end', 'selectedID');
        $this->resetErrorBag();
    }
}
