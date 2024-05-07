<div>
    <table class="table">
        <thead class="table-primary">
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
                    <td>
                        <button class="btn btn-icon-blue" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $cat->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-icon-purple" wire:click="delete({{ $cat->id }})"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn-float" data-bs-target='#addModal' data-bs-toggle='modal'>
        <i class="bi bi-plus-lg"></i>
        Add Category
    </button>


    @include('livewire.video_categories.add')
    @include('livewire.video_categories.edit')
    @include('livewire.video_categories.view')
</div>
