<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    View Video
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <l-dot-spinner class="align-self-center m-5" color="black" size="100" speed="0.9" wire:loading></l-dot-spinner>
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
                    @if ($thumbnail && $video)
                        <video controls height="200px" poster="{{ $thumbnail }}" width='300px'>
                            <source src="{{ $this->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif

                    <div wire:loading>Loading</div>
                </div>
            </div>
        </div>
    </div>
</div>
