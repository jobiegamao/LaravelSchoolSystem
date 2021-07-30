<div class="table-responsive">
    <table class="table" id="students-table">
        <thead>
        <tr>
            <th>Person ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Programme</th>
            <th>Programme Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $students)
            <tr>
                <td>
                    {{ $students->person_id }}
                </td>
                <td>
                    {{-- <a href="{{ route('students.show', [$students->id]) }}">{{ $students->id }}</a> --}}
                    {{ $students->id }}
                </td>
                <td>
                    {{ $students->full_name() }}
                    
                </td>
                <td>
                    
                    @forelse ($students->enrolledProgramme as $course )
                        <div class='input-group'>    
                            <div class="group-prepend">
                                <span class="input-group-text p-1">{{ $course->programme->name}}</span>
                            </div>
                            
                            {!! Form::open(['route' => ['enrollProgramme.delete', $course->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fa fa-times"></i>', 
                                ['type' => 'submit', 'class' => 'btn bg-transparent',
                                'onclick' => "return confirm('Are you sure you want to uneroll program?')"]) 
                                !!}
                            {!! Form::close() !!}
                            
                        </div>
                    @empty
                        No Course yet
                    @endforelse
                
                </td>
                <td>
                    @forelse ($students->enrolledProgramme as $course )
                        <div class="group-prepend">
                            <span class="input-group-text p-1">{{ $course->description}}</span>
                        </div>
                    @empty
                        No Course yet
                    @endforelse
                

                </td>
                 <td>
                    {!! Form::open(['route' => ['student.delete', $students->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        
                        <a href="{{ route('goTo_enrollProgramme', [$students->id]) }}"
                           class='btn btn-default'>
                            Add Programme
                        </a> 
                        {!! Form::button('<i class="far fa-trash-alt"></i>', 
                        ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',
                         'onclick' => "return confirm('Are you sure you want to delete student ID?')"]) !!}
                    </div>
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
