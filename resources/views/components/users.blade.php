@if($type == 'student')
    <tr>
        <th>{{ $count }}</th> 
        <td>{{ $data->fullname }}</td> 
        <td>{{ $data->user_id }}</td> 
        <td>{{ $data->email }}</td>
    </tr>
@else
    <tr>
        <th>{{ $count }}</th> 
        <td>{{ $data->fullname }}</td> 
        <td>{{ $data->user_id }}</td> 
        <td>{{ $data->email }}</td>
        <th>
            <a class="btn btn-ghost btn-xs" href="/teacher/tag/{{ $data->id }}">Tag Student</a>
        </th>
    </tr>
@endif