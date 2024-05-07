<div>
    <table class="table">
        <thead class="table-primary">
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
                        <button class="btn btn-icon-green" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $announce->id }})"><i class="bi bi-eye-fill"></i></button>
                        <button class="btn btn-icon-blue" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $announce->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-icon-purple" wire:click="delete({{ $announce->id }})"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn-float" data-bs-target='#addModal' data-bs-toggle='modal'>
        <i class="bi bi-plus-lg"></i>
        Add Announcement
    </button>


    @include('livewire.announcements.add')
    @include('livewire.announcements.edit')
    @include('livewire.announcements.view')
</div>
