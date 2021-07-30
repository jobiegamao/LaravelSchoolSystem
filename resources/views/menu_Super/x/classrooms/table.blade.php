<div class="table-responsive">
    <table class="table" id="classrooms-table">
        <thead>
        <tr>
            <th>Classroom Name</th>
        <th>Classroom Code</th>
        <th>Classroom Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classrooms as $classrooms)
            <tr>
                <td>{{ $classrooms->classroom_name }}</td>
            <td>{{ $classrooms->classroom_code }}</td>
            <td>{{ $classrooms->classroom_status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['classrooms.destroy', $classrooms->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('classrooms.show', [$classrooms->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('classrooms.edit', [$classrooms->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
