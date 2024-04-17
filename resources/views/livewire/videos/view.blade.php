<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    View Video
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <l-ring bg-opacity="0" class="align-self-center m-5" color="black" size="100" speed="2" stroke="10" wire:loading wire:target='getData'></l-ring>
            <div class="modal-body" wire:loading.remove>
                <div class="mb-3">
                    <label class="form-label" for="view-title">Title</label>
                    <input class="form-control" disabled id='view-title' type="text" wire:model='title'>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="view-description">Description</label>
                    <textarea class="form-control" disabled id='view-description' rows="5" wire:model='description'></textarea>
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label class="form-label">Video Content</label>
                    @if ($video_path && $thumbnail_path)
                        <video controls height="200px" id='view-video' poster="{{ $thumbnail_path }}" width='300px' class="object-fit-cover border rounded">
                            <source src="{{ $video_path }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
