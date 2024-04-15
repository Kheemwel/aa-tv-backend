<?php

namespace App\Livewire;

use App\Models\VideoCategories;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Video Categories')]
class VideoCategoriesLivewire extends Component
{
    public $category_name, $selectedID;
    public function render()
    {
        $categories = VideoCategories::latest()->get();
        return view('livewire.video_categories.video-categories-livewire')->with('categories', $categories);
    }

    
    public function add()
    {
        $validated = $this->validate([
            'category_name' => 'required|string',
        ]);

        VideoCategories::create($validated);
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function getData($id)
    {
        $this->selectedID = $id;

        $category = VideoCategories::find($id);
        $this->category_name = $category->category_name;
    }

    public function update()
    {
        $validated = $this->validate([
            'category_name' => 'required|string',
        ]);

        VideoCategories::find($this->selectedID)->update($validated);
        
        $this->resets();
        $this->dispatch('closeModals');
    }

    public function delete($id)
    {
        VideoCategories::find($id)->delete();
    }

    public function resets()
    {
        $this->reset('category_name', 'selectedID');
        $this->resetErrorBag();
    }
}
