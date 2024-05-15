<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    View Video
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="spinner-border align-self-center m-5" role="status" style="height: 5rem; width: 5rem;" wire:loading wire:target='getData'>
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="modal-body" wire:loading.remove wire:target='getData'>
                <div class="mb-3">
                    <label class="form-label" for="view-title">Title</label>
                    <input class="form-control" disabled id='view-title' type="text" wire:model='title'>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="view-description">Description</label>
                    <textarea class="form-control" disabled id='view-description' rows="5" wire:model='description'></textarea>
                </div>
                <div class="mb-3 d-flex flex-column video-container">
                    <label class="form-label">Video Content</label>
                    <video class="object-fit-cover border rounded align-self-center" controls height="200px" id='view-video' poster="{{ $thumbnail_path }}" width='300px'>
                        <source src="{{ $video_path }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
