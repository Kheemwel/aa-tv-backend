<div class="col-10 overflow-auto">
    <table class="table">
        <thead class="sticky-top table-primary">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
            <tr>
                
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->category_name }}</td>
                <td><button class="btn btn-icon-green" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $cat->id }})"><i class="bi bi-eye-fill"></i></button>
                    <button class="btn btn-icon-blue" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $cat->id }})"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-icon-purple" wire:click="delete({{ $cat->id }})"><i class="bi bi-trash-fill"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary float-end sticky-bottom" data-bs-target='#addModal' data-bs-toggle='modal'>
        Add Category
    </button>

    
    @include('livewire.video_categories.add')
    @include('livewire.video_categories.edit')
    @include('livewire.video_categories.view')
</div>
