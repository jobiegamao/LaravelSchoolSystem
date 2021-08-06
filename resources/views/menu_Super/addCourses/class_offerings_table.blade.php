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
            <th> <small>Reserved<br>Slots</small></th>
            <th><small>Enrolled<br>Slots</small></th>
            <th><small>Available<br>Slots</small></th>

            <th>Add</th>
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
                    
                    {{ $classes->year }}
                </td>
                <td>
                   

                </td>
                <td>
                   

                </td>
                <td>
                   {{-- add class code to StudentClass table --}}
                    
                    {{-- cC OME BAKC HERE COME BACK --}}

                    
                    <a href="{{ route('studentClass.store', [
                        'student_id' => $student->id, 
                        'classOffering_id' => $classes->id,
                        'sem' => $classes->semester,
                        'year' => $classes->year,
                        ]) }}"
                        class='btn btn-primary'> Add Class
                     </a> 

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
