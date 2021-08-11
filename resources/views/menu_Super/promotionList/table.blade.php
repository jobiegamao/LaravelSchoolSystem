<div class="table-responsive">
    <table class="table" id="students-table">
        <thead>
        <tr>
            <th>Person ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Programme</th>
            <th>Programme Type</th>
            
            <th>Course Grades</th>
            <th>Evaluation Pass <br><small>Pass for Next Enrollment</small></th>
            <th>Year Promotion<br><small>Promote College Level</small></th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($students  as $students )
            <tr>
                <td>
                    {{ $students->person_id }}
                </td>
                <td>
                    {{-- <a href="{{ route('students.show', [$students ?? ''->id]) }}">{{ $students ?? ''->id }}</a> --}}
                    {{ $students->id }}
                </td>
                <td>
                    {{ $students->full_name() }}
                </td>
                <td>
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                   
                        {!! Form::text('year',$students->year, ['class' => 'border-0 w-2', 'size' => 10]) !!}
                    
                    
                    <a href="{{ route('student.update', [$students->id]) }}"></a>
                    {!!Form::close()!!} 
                </td>
                <td>
                    
                    @forelse ($students->EnrolledProgramme as $course )  
                        {{ $course->progCode}}<br>
                    @empty
                        New Enrollment
                    @endforelse
                
                </td>
                <td>
                    @forelse ($students->EnrolledProgramme as $course )
                       
                            {{ $course->description}} <br>
                    @empty
                        New Enrollment
                    @endforelse
                

                </td>
                
                <td>
                    {{-- class grade link --}}
                    @forelse ($students->EnrolledProgramme as $course )
                       
                        
                    @empty
                        No Grades Yet
                    @endforelse
                </td>


                
                <td>
                    {{-- promote student to next sem, isPass to be true if allowed to enroll next sem --}}
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                    @switch($students->isPass)
                        @case(0)
                            {!! Form::hidden('isPass', 1) !!}
                            {{Form::submit('Promote',['class' => 'btn btn-default'])}}
                            @break
                        @default
                            {!! Form::hidden('isPass', 0) !!}
                            Passed
                            {{Form::button('<i class="fa fa-trash"></i>',['class' => 'btn btn-xs remove-circle-outline','type' => 'submit', 
                            'onclick' => "return confirm('Are you sure you want to unpromote student?')"])}}
                            
                    @endswitch
                    {!!Form::close()!!} 
                        
                    
                </td>

                <td>
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                        {!! Form::hidden('year', $students->year + 1 ) !!}
                    {{Form::submit('Promote',['class' => 'btn btn-default'])}}
                    {!!Form::close()!!} 
                </td>
                <td>
                    {{-- Delete Student ID --}}
                    {!! Form::open(['route' => ['student.delete', $students->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="far fa-trash-alt"></i>', 
                        ['type' => 'submit', 'class' => 'btn btn-danger btn-xs float-right',
                         'onclick' => "return confirm('Are you sure you want to delete student ID?')"]) !!}
                    {!! Form::close() !!}
                </td>
               
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@push('scripts')
    <script
    src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#students-table').DataTable();
           
        } );

        
    </script>

    
@endpush
