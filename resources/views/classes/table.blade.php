<div class="table-responsive">
    <table class="table" id="classes-table">
        <thead>
        <tr>
        <th>Class Name</th>
        <th>Class Code</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($class as $classes)
            <tr>
            <td>{{ $classes->class_name }}</td>
            <td>{{ $classes->class_code }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['classes.destroy', $classes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('classes.show', [$classes->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('classes.edit', [$classes->id]) }}"
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
