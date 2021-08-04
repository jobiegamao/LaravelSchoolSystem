<div class="table-responsive">
    <table class="table" id="prereg-table">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Class Code</th>
                    <th>Subject Code</th>
                    <th>Title</th>
                    <th>Schedule</th>
                    <th>Teacher</th>
                    <th>Units</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
        {{-- StudentClass Table --}}
        @foreach($prereg as $prereg)
            <tr>
                <td>
                    {{ $prereg->year }}
                </td>
                <td>
                    {{ $prereg->semester }}
                </td>
                <td>
                    {{ $prereg->ClassOffering->classCode }}
                </td>
                <td>
                    {{ $prereg->ClassOffering->subjCode }}
                </td>
                <td>
                    {{ $prereg->ClassOffering->Course->subjName }}
                </td>
                <td>
                    {{ $prereg->ClassOffering->schedule }}
                </td>
                <td>
                    {{-- {{ $prereg->ClassOffering->Teacher->Person->full_name() }} --}}
                </td>
                <td>
                    {{ $prereg->ClassOffering->Course->units }}

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
            $('#prereg-table').DataTable();
           
        } );
    </script>
@endpush
