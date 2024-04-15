<div class="col-10 overflow-auto">
    <table class="table">
        <thead class="sticky-top table-primary">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->description }}</td>
                    <td>{{ $video->category_name }}</td>
                    <td>
                        <button class="btn btn-success" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $video->id }})"><i class="bi bi-eye-fill"></i></button>
                        <button class="btn btn-primary" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $video->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger" wire:click="delete({{ $video->id }})"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary float-end sticky-bottom" data-bs-target='#addModal' data-bs-toggle='modal'>
        Add Video
    </button>

    @include('livewire.videos.add')
    @include('livewire.videos.view')
</div>
