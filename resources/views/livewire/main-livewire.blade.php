<div wire:poll.1000ms class="col-10 overflow-auto">
    <table class="table">
        <thead class="sticky-top table-primary">
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
                <td><button class="btn btn-danger" wire:click="delete({{ $data->id }})"><i class="bi bi-trash-fill"></i> Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
