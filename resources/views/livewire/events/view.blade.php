<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Event Info
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="view-title">Title</label>
                    <input class="form-control" id='view-title' type="text" value="{{ $title }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="view-description">Description</label>
                    <textarea class="form-control" id='view-description' disabled rows="5">{{ $description }}</textarea>
                </div>
                <div class="mb-3 d-flex justify-content-evenly">
                    <div>
                        <label class="form-label" for="view-event-start">Event Start</label>
                        <input disabled class="form-control" id='input-event-start' min="2024-01-01T00:00" type="datetime-local" wire:model='event_start'>
                    </div>
                    <div>
                        <label class="form-label" for="view-event-end">Event End</label>
                        <input disabled class="form-control" id='input-event-end' min="2024-01-01T00:00" type="datetime-local" wire:model='event_end'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
