<div class="table-responsive">
    <table class="table" id="studentcourses-table">
        <thead>
        <tr>
            <th>Code</th>
            <th>Subject</th>
            <th>Prerequisite Subjects</th>
            <th>Major or Minor</th>
            
            <th>Final Grade</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($course as $course)
            <tr>
                <td>
                    {{ $course->subjcode }}
                </td>
                <td>
                    {{ $course->subjname }}
                </td>
                <td>
                   
                    
                </td>
                <td>
                    
                    @switch($course->isProfessional)
                        @case(1)
                            Major
                            @break
                        @default
                            Core/Minor
                    @endswitch
                   
                </td>
                <td>
                   

                </td>
                <td>
                   

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
            $('#studentcourses-table').DataTable();
           
        } );
    </script>
@endpush
