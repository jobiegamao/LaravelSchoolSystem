<div class="table-responsive">
    <table class="table" id="prereg-table">
            <thead>
                <tr>
                    <th>CO-ID</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Class Code</th>
                    <th>Subject Code</th>
                    <th>Title</th>
                    <th>Schedule</th>
                    <th>Teacher</th>
                    <th>Units</th>
                    <th>Drop</th>
                </tr>
            </thead>
        <tbody>
        {{-- ClassOffering Table --}}
        @foreach($prereg as $prereg)
            <tr>
                <td>
                    {{ $prereg->id }}
                </td>
                <td>
                    {{ $prereg->year }}
                </td>
                <td>
                    {{ $prereg->semester }}
                </td>
                <td>
                    {{ $prereg->classCode }}
                </td>
                <td>
                    {{ $prereg->subjCode }}
                </td>
                <td>
                    {{ $prereg->Course->subjName }}
                </td>
                <td>
                    {{ $prereg->schedule }}
                </td>
                <td>
                    {{ $prereg->Teacher->full_name() }}
                </td>
                <td>
                    {{ $prereg->Course->units }}
                  

                    
                </td>
                <td>
                   
                    <form action="{{ route('studentClass.delete', [
                                'id' => $student->person_id,
                                'student_id' => $student->id, 
                                'classOffering_id' => $prereg->id,
                                'sem' => $prereg->semester,
                                'year' => $prereg->year,
                                'backToPreregView' => true
                                ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Delete">Drop</button>
                    </form>

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
