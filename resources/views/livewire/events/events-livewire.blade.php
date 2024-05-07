<div>
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Event Start</th>
                <th>Event End</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>

                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ date('F d, Y h:i A', strtotime($event->event_start)) }}</td>
                    <td>{{ date('F d, Y h:i A', strtotime($event->event_end)) }}</td>
                    <td>
                        <button class="btn btn-icon-green" data-bs-target='#viewModal' data-bs-toggle='modal' wire:click="getData({{ $event->id }})"><i class="bi bi-eye-fill"></i></button>
                        <button class="btn btn-icon-blue" data-bs-target='#editModal' data-bs-toggle='modal' wire:click="getData({{ $event->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-icon-purple" wire:click="delete({{ $event->id }})"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn-float" data-bs-target='#addModal' data-bs-toggle='modal'>
        <i class="bi bi-plus-lg"></i>
        Add Event
    </button>
    @include('livewire.events.add')
    @include('livewire.events.edit')
    @include('livewire.events.view')
</div>
