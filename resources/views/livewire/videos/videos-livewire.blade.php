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
            @foreach ($videos as $vid)
                <tr>
                    <td>{{ $vid->id }}</td>
                    <td>{{ $vid->title }}</td>
                    <td>{{ $vid->description }}</td>
                    <td>{{ $vid->category_name }}</td>
                    <td>
                        <button class="btn btn-success" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $vid->id }})"><i class="bi bi-eye-fill"></i></button>
                        <button class="btn btn-primary" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $vid->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger" wire:click="delete({{ $vid->id }})"><i class="bi bi-trash-fill"></i></button>
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
    @include('livewire.videos.edit')
</div>

@section('scripts')
    <script>
        Livewire.on('loadVideo', () => {
            setTimeout(() => {
                $('video').each(function() {
                    this.load();
                });
            }, 0);
        });
    </script>
@endsection
