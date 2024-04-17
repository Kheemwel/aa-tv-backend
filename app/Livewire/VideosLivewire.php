<?php

namespace App\Livewire;

use App\Models\VideoCategories;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title('Videos')]
class VideosLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $thumbnail, $video, $thumbnail_path, $video_path;
    public $video_category_id = '';
    public $selectedID, $categories;

    public function mount()
    {
        $this->categories = VideoCategories::all();
    }

    public function render()
    {
        $videos = Videos::latest()->get();
        return view('livewire.videos.videos-livewire')->with('videos', $videos);
    }

    public function rendered()
    {
        $this->dispatch('loadVideo');
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

        $thumbnailPath = $this->thumbnail->storeAs('images', 'thumbnail--'.Str::random(50).'.'.$this->thumbnail->getClientOriginalExtension(), 'private');
        $videoPath = $this->video->storeAs('videos', 'video--'.Str::random(50).'.'.$this->video->getClientOriginalExtension(), 'private');
        Videos::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_category_id' => $validated['video_category_id'],
            'thumbnail_path' => $thumbnailPath,
            'video_path' => $videoPath,
        ]);

        $this->resets();
    }

    public function getData($id)
    {
        $api_token = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';

        $this->selectedID = $id;

        $video = Videos::find($id);
        $this->title = $video->title;
        $this->description = $video->description;
        $this->video_category_id = $video->video_category_id;
        $this->thumbnail_path = $video->thumbnail_path.'/'.$api_token;
        $this->video_path = $video->video_path.'/'.$api_token;
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $video = Videos::find($id);
        $video->delete();
        Storage::disk('private')->delete($video->thumbnail_path);
        Storage::disk('private')->delete($video->video_path);
    }

    public function resets()
    {
        $this->reset('title', 'description', 'thumbnail', 'video', 'video_category_id', 'selectedID', 'thumbnail_path', 'video_path');
        $this->resetErrorBag();
        $this->dispatch('resetFileInputs');
    }
}
