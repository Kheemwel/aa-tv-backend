<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Event
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <form id='form-edit' wire:submit.prevent="update()">
                    <div class="mb-3">
                        <label class="form-label" for="edit-title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id='eidt-title' type="text" wire:model='title'>
                        <div class="invalid-feedback">
                            Please enter title
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id='edit-description' rows="5" wire:model='description'></textarea>
                        <div class="invalid-feedback">
                            Please enter description
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-evenly">
                        <div>
                            <label class="form-label" for="edit-event-start">Event Start</label>
                            <input class="form-control @error('event_start') is-invalid @enderror" id='edit-event-start' min="2024-01-01T00:00" type="datetime-local" wire:model='event_start'>
                            <div class="invalid-feedback">
                                @error('event_start')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="edit-event-end">Event End</label>
                            <input class="form-control @error('event_end') is-invalid @enderror" id='edit-event-end' min="2024-01-01T00:00" type="datetime-local" wire:model='event_end'>
                            <div class="invalid-feedback">
                                @error('event_end')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-primary w-25" form="form-edit" type="submit">Save Changes</button>
            </div>
        </div>
    </div>
</div>
