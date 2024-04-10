<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="add()">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Add Announcement
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="input-title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id='input-title' type="text" wire:model='title'>
                        <div class="invalid-feedback">
                            Please enter title
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id='input-message' wire:model='message'></textarea>
                        <div class="invalid-feedback">
                            Please enter message
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary w-25" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
