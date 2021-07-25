<div class="table-responsive">
    <table class="table" id="students-table">
        <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Course</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $students)
            <tr>
                <td>
                    <a href="{{ route('students.show', [$students->id]) }}">{{ $students->id }}</a>
                </td>
                <td>{{ $students->registration->admission['name'] }}</td>
                <td>
                    
                    @forelse ($students->courseEnrolled as $course )
                            {{ $course->course_name }} <br>
                    @empty
                        "No Course"
                    @endforelse
                
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['students.destroy', $students->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        
                        <a href="{{ route('students.edit', [$students->id]) }}"
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
