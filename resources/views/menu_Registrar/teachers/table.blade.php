<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
        <tr>
            <th>PID</th>
            <th>Teacher ID</th>
            <th>Name</th>
            <th>Classes</th>
            
        </tr>
        </thead>
        <tbody>
            
        @foreach($t as $t )
            <tr>
                <td>
                    {{ $t->person_id }}
                </td>
                <td>
                    {{ $t->id }}
                </td>
                <td>
                    {{ $t->full_name() }}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['teacher.classes',  $t->id] ]) !!}
                        {{Form::submit('Class List',['class' => 'btn btn-link'])}}
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
            $('#teachers-table').DataTable();
           
        } );

        
    </script>

    
@endpush
