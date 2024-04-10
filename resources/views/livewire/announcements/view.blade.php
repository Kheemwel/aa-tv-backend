<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Announcement Info
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="view-title">Title</label>
                    <input class="form-control" id='view-title' type="text" value="{{ $title }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="view-message">Message</label>
                    <textarea class="form-control" id='view-message' disabled rows="5">{{ $message }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
