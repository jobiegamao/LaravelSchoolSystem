<div class="table-responsive">
    <table class="table" id="classofferings-table">
        <thead>
        <tr>
            <th>Semester</th>
            <th>Units</th>
            
            <th>Class Code</th>
            <th>Subject Code</th>
            <th>Subject Title</th>
            <th>Schedule</th>
            <th>Instructor</th>
            <th>Room</th>
            <th>Reserve</th>
            <th>Enrolled</th>
            <th>Available</th>

            <th>Add Class</th>
        </tr>
        </thead>
        <tbody>
        {{-- foreach classoffering  --}}
        @foreach($classes as $classes)
            <tr>
                <td>
                    {{ $classes->semester }}
                </td>
                <td>
                    {{ $classes->Course->units }}

                </td>
                
                <td>
                    {{ $classes->classCode }}
                </td>
                <td>
                    {{ $classes->subjCode }}
                </td>
                <td>
                    {{ $classes->Course->subjName }}
                </td>
                <td>
                    {{ $classes->schedule }}
                </td>
                <td>
                    {{-- {{ $classes->teacher_id }} --}}
            
                </td>
                <td>
                    {{ $classes->room }}

                </td>
                <td>
                    

                </td>
                <td>
                   

                </td>
                <td>
                   

                </td>
                <td>
                   {{-- add class code to StudentClass table --}}
                    
                    {{-- cC OME BAKC HERE COME BACK --}}
                     {!! Form::open(['route' => 'courseProgramme.show']) !!}

                        {!! Form::hidden('addInPreReg', 'true' ) !!}
                        {!! Form::hidden('id', $person->id ) !!}
                        {!! Form::hidden('year', $year ) !!}
                        {!! Form::hidden('semester', $semester ) !!}
                        {!! Form::hidden('student_id', $person->Student->id ) !!}
                        {!! Form::hidden('subjCode', $classes->subjCode ) !!}
                        {!! Form::hidden('classOffering_id', $classes->id ) !!}
                        {!! Form::hidden('schedule',  $classes->schedule ) !!}
                        {!! Form::hidden('units',  $classes->Course->units ) !!}
                        {{Form::submit('Add',['class' => 'btn btn-success'] )}}
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
            $('#classofferings-table').DataTable();
           
        } );
    </script>
@endpush