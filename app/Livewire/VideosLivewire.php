<?php

namespace App\Livewire;

use App\Models\VideoCategories;
use App\Models\Videos;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Videos')]
class VideosLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $thumbnail, $video, $video_category_id = '';
    public $selectedID, $categories;

    public function mount()
    {
        $this->categories = VideoCategories::all();
    }

    public function render()
    {
        $videos = Videos::latest()->select('id', 'title', 'description', 'video_category_id')->get();
        return view('livewire.videos.videos-livewire')->with('videos', $videos);
    }

    public function add()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'required|mimetypes:image/png,image/jpg,image/jpeg|max:16000',
            'video' => 'required|mimetypes:video/mp4|max:1000000',
            'video_category_id' => 'required|int'
        ], [
            'thumbnail.required' => 'Please upload image for thumbnail',
            'thumbnail.max' => 'Image must be less than 16MB',
            'video.required' => 'Please upload video',
            'video.max' => 'Video must be less than 1GB'
        ]);

        $thumbnail_content = file_get_contents($validated['thumbnail']->getRealpath());
        $video_content = file_get_contents($validated['video']->getRealpath());
        Videos::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'thumbnail' => $thumbnail_content,
            'video' => $video_content,
            'video_category_id' => $validated['video_category_id']
        ]);

        $this->resets();
    }

    public function getData($id)
    {

        $this->selectedID = $id;

        $video = Videos::find($id);
        $this->title = $video->title;
        $this->description = $video->description;
        $this->thumbnail = "data:image;base64," . base64_encode($video->thumbnail);
        $this->video = "data:video;base64," . base64_encode($video->video);
        $this->video_category_id = $video->video_category_id;
    }

    public function update()
    {
    }

    public function delete($id)
    {
        Videos::find($id)->delete();
    }

    public function resets()
    {
        $this->reset('title', 'description', 'thumbnail', 'video', 'video_category_id', 'selectedID');
        $this->resetErrorBag();
        $this->dispatch('resetFileInputs');
    }
}
