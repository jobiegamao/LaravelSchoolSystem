<div class="table-responsive">
    <table class="table" id="studentCourses-table">
        <thead>
        <tr>
            <th>Student Id</th>
        <th>Course Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentCourses as $studentCourses)
            <tr>
                <td>{{ $studentCourses->student_id }}</td>
            <td>{{ $studentCourses->course_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['studentCourses.destroy', $studentCourses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('studentCourses.show', [$studentCourses->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('studentCourses.edit', [$studentCourses->id]) }}"
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
