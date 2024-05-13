<div wire:poll.2500ms>
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Game Name</th>
                <th>Description</th>
                <th>DateTime</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gameData as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->game_name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ date('F d, Y (h:i A)', strtotime($data->date_time)) }}</td>
                    <td><button class="btn btn-icon-purple" wire:click="delete({{ $data->id }})"><i class="bi bi-trash-fill"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
