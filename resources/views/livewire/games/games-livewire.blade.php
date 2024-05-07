<div wire:poll.1000ms>
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Prize</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gameData as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->user_name }}</td>
                    <td>{{ $data->prize }}</td>
                    <td>{{ date('F d, Y', strtotime($data->date_time)) }}</td>
                    <td>{{ date('h:i A', strtotime($data->date_time)) }}</td>
                    <td><button class="btn btn-icon-purple" wire:click="delete({{ $data->id }})"><i class="bi bi-trash-fill"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
