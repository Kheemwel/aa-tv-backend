<div aria-hidden="true" aria-labelledby="modalTitleId" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add Category
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button" wire:click='resets()'></button>
            </div>
            <div class="modal-body">
                <form id='form-add' wire:submit.prevent="add()">
                    <div class="mb-3">
                        <label class="form-label" for="input-category-name">Category Name</label>
                        <input class="form-control @error('category_name') is-invalid @enderror" id='input-category-name' type="text" wire:model='category_name'>
                        <div class="invalid-feedback">
                            Please enter category name
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
