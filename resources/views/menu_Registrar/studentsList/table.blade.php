<div class="table-responsive">
    <table id="students-table" class="table table-hover" style="width:100%;">
        <thead>
        <tr>
            <th>PID</th>
            <th>SNO</th>
            <th>Name</th>
            <th>Year</th>
            <th>Programme</th>
            <th>Status</th>
            
            <th></th>
            <th></th>
            <th></th>
            <th>Evaluation<br><small>Pass for Next Enrollment</small></th>
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
                    <a href="{{ route('courseProgramme.show', ['id' => $students->person_id]) }}"
                        class='btn btn-link p-0'>
                        Curriculum
                    </a> 
                </td>

                <td>
                    {{-- class grade of student per sem  --}}
                    
                    <a href="{{ route('grades.show', ['id' => $students->id]) }}"
                        class='btn btn-link p-0'>
                        Grades
                    </a> 

                </td>

                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['balance', 'id' => $students->person_id] ]) !!}
                        {!! Form::hidden('acadPeriod_id', \App\Models\AcadPeriod::latest()->value('id')) !!}
                        {{Form::submit('Balance',['class' => 'btn btn-link p-0'])}}
                    {!! Form::close() !!}
                    
                </td>
                
                <td>
                    {{-- promote student to next sem, isPass to be true if allowed to enroll next sem --}}
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                    @switch($students->isPass)
                        @case(0)
                            {!! Form::hidden('isPass', 1) !!}
                            {{Form::submit('Approve',['class' => 'btn btn-info'])}}
                            @break
                        @default
                            @if ($students->isEnrolled == 1)
                                Enrolled
                            @else
                                {!! Form::hidden('isPass', 0) !!}
                                {{Form::button('Approved <i class="fas fa-times"></i>',['class' => 'btn btn-delete remove-circle-outline','type' => 'submit', 
                                'onclick' => "return confirm('Are you sure you want to unpromote student?')"])}}
                            @endif
                               
                            
                    @endswitch
                    {!!Form::close()!!} 
                        
                    
                </td>

                
                <td>

                    {{-- Edit programme type status && Delete Student ID --}}
                    {!! Form::open(['route' => ['student.delete', $students->id], 'method' => 'delete']) !!}
                    
                    <a href={{ route('enrollProgramme.edit', $students->id ) }}
                        class='btn btn-edit btn-xs'>
                        <i class="far fa-edit"></i>
                    </a>
                    
                    
                    {!! Form::button('<i class="far fa-trash-alt"></i>', 
                        ['type' => 'submit', 'class' => 'btn btn-delete btn-xs',
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
