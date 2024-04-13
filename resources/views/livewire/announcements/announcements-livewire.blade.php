<div class="col-10 overflow-auto">
    <table class="table">
        <thead class="sticky-top table-primary">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Date Created</th>
                <th>Time Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announce)
                <tr>
                    <td>{{ $announce->id }}</td>
                    <td>{{ $announce->title }}</td>
                    <td>{{ $announce->message }}</td>
                    <td>{{ date('F d, Y', strtotime($announce->created_at)) }}</td>
                    <td>{{ date('h:i A', strtotime($announce->created_at)) }}</td>
                    <td>
                        <button class="btn btn-success" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $announce->id }})"><i class="bi bi-eye-fill"></i></button>
                        <button class="btn btn-primary" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $announce->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger" wire:click="delete({{ $announce->id }})"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary float-end sticky-bottom" data-bs-target='#addModal' data-bs-toggle='modal'>
        Add Announcement
    </button>

    @include('livewire.announcements.add')
    @include('livewire.announcements.edit')
    @include('livewire.announcements.view')
</div>
