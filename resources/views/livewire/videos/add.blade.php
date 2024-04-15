<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content" x-data='{ thumbnailUpload: false, videoUpload: false}'>
            <div class="modal-header">
                <h5 class="modal-title">
                    Upload New Video
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <form id='form-add' wire:submit.prevent='add()'>
                    <div class="mb-3">
                        <label class="form-label" for="input-title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id='input-title' type="text" wire:model='title'>
                        <div class="invalid-feedback">
                            Please enter title
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id='input-description' rows="5" wire:model='description'></textarea>
                        <div class="invalid-feedback">
                            Please enter description
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="select-category">Category</label>
                        <select class="form-select @error('video_category_id') is-invalid @enderror" wire:model='video_category_id'>
                            <option disabled selected value="">Select Category</option>
                            @foreach ($categories as $cat)
                                <option value='{{ $cat->id }}'>{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select category
                        </div>
                    </div>
                    <div class="mb-3" x-data="{ progress: 0 }" x-on:livewire-upload-error="thumbnailUpload = false; progress = 0" x-on:livewire-upload-finish="thumbnailUpload = false; progress = 0" x-on:livewire-upload-progress="progress = $event.detail.progress" x-on:livewire-upload-start="thumbnailUpload = true">
                        <label class="form-label" for="upload-thumbnail">Thumbnail</label>
                        <input accept=".png, .jpg, .jpeg" class="form-control @error('thumbnail') is-invalid @enderror" type="file" wire:model='thumbnail'>
                        <div class="invalid-feedback">
                            @error('thumbnail')
                                {{ $message }}
                            @enderror
                        </div>
                        <!-- Progress Bar -->
                        <div class="progress mt-1" x-show="thumbnailUpload">
                            <div aria-valuemax="100" aria-valuemin="0" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" x-bind:style="`width: ${progress}%;`" x-text="progress + '%'"></div>
                        </div>
                    </div>
                    <div class="mb-3" x-data="{ progress: 0 }" x-on:livewire-upload-error="videoUpload = false; progress = 0" x-on:livewire-upload-finish="videoUpload = false; progress = 0" x-on:livewire-upload-progress="progress = $event.detail.progress" x-on:livewire-upload-start="videoUpload = true">
                        <label class="form-label" for="upload-video">Video</label>
                        <input accept=".mp4" class="form-control @error('video') is-invalid @enderror" id="upload-video" type="file" wire:model='video'>
                        <div class="invalid-feedback">
                            @error('video')
                                {{ $message }}
                            @enderror
                        </div>
                        <!-- Progress Bar -->
                        <div class="progress mt-1" x-show="videoUpload">
                            <div aria-valuemax="100" aria-valuemin="0" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" x-bind:style="`width: ${progress}%;`" x-text="progress + '%'"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-primary w-25" form="form-add" type="submit" x-bind:disabled='thumbnailUpload || videoUpload'>Save</button>
            </div>
        </div>
    </div>
</div>
