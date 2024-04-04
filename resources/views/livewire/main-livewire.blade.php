<div wire:poll.1000ms class="col-10">
    <table class="table">
        <thead class="sticky-top">
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Prize</th>
                <th>Date</th>
                <th>Time</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
