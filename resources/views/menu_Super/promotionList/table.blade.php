<div class="table-responsive">
    <table class="table" id="students-table">
        <thead>
        <tr>
            <th>Person ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Programme</th>
            <th>
            </th>
            
            <th>Courses</th>
            <th>Grades</th>
            <th>Balance</th>
            <th>Evaluation Pass <br><small>Pass for Next Enrollment</small></th>
            {{-- <th>Year Promotion<br><small>Promote College Level</small></th> --}}
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
                    {{-- Programme --}}
                    @forelse ($students->EnrolledProgramme as $ep )  
                        {{ $ep->progCode}}<br>
                    @empty
                        New Enrollment
                    @endforelse
                
                </td>
                <td>
                    {{-- Programme Desc --}}
                    @forelse ($students->EnrolledProgramme as $ep )
                            <small> 
                            {{ $ep->description}} -- {{ $ep->statusText()}}
                            </small><br>
                    @empty
                        New Enrollment
                    @endforelse
                

                </td>
                
                <td>
                    {{-- curric  --}}
                    {!! Form::open(['method' => 'POST', 'route' => 'courseProgramme.show' ]) !!}
                        {!! Form::hidden('id', $students->person_id ) !!}   
                        {{Form::submit('Curriculum',['class' => 'btn btn-link'])}}
                    {!! Form::close() !!}
                </td>

                <td>
                    {{-- class grade of student per sem  --}}
                    {!! Form::open(['method' => 'POST', 'route' => ['grades.show', 'id' => $students->id] ]) !!}
                    {{Form::submit('Grades',['class' => 'btn btn-link'])}}
                    {!! Form::close() !!}

                </td>

                <td>
                    <a href="{{ route('balance', [$students->person_id]) }}"
                        class='btn btn-link p-0'>
                        Balance
                    </a> 
                </td>
                
                <td>
                    {{-- promote student to next sem, isPass to be true if allowed to enroll next sem --}}
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                    @switch($students->isPass)
                        @case(0)
                            {!! Form::hidden('isPass', 1) !!}
                            {{Form::submit('Approve',['class' => 'btn btn-default'])}}
                            @break
                        @default
                            {!! Form::hidden('isPass', 0) !!}
                            {{Form::button('Approved <i class="fas fa-times"></i>',['class' => 'btn remove-circle-outline','type' => 'submit', 
                            'onclick' => "return confirm('Are you sure you want to unpromote student?')"])}}
                            
                    @endswitch
                    {!!Form::close()!!} 
                        
                    
                </td>

                
                <td>

                    {{-- Edit programme type status && Delete Student ID --}}
                    {!! Form::open(['route' => ['student.delete', $students->id], 'method' => 'delete']) !!}
                    
                    <a href={{ route('enrollProgramme.edit', $students->id ) }}
                        class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                    </a>
                    
                    
                    {!! Form::button('<i class="far fa-trash-alt"></i>', 
                        ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',
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
