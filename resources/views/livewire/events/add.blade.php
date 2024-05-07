<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add Events
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <form id='form-add' wire:submit.prevent="add()">
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
                    <div class="mb-3 d-flex justify-content-evenly">
                        <div>
                            <label class="form-label" for="input-event-start">Event Start</label>
                            <input class="form-control @error('event_start') is-invalid @enderror" id='input-event-start' min="2024-01-01T00:00" type="datetime-local" wire:model='event_start'>
                            <div class="invalid-feedback">
                                @error('event_start')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="input-event-end">Event End</label>
                            <input class="form-control @error('event_end') is-invalid @enderror" id='input-event-end' min="2024-01-01T00:00" type="datetime-local" wire:model='event_end'>
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
                <x-submit-button form="form-add" target='add'>Save</x-submit-button>
            </div>
        </div>
    </div>
</div>
