<div class="table-responsive">
    <table class="table" id="enrollment-table">
        <thead>
        <tr>
            <th>Person ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Programme</th>
            <th>Programme Type</th>
            <th><small>Action</small></th>
            <th><small>Units</small></th>
            <th><small>Course Registration</small></th>
            <th>Enrollment Status</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($students  as $students )
            

            <tr>
                <td>
                    {{ $students->person_id }}
                </td>
                <td>
                    {!! Form::open(['method' => 'POST', 'route' => 'courseProgramme.show' ]) !!}
                        {!! Form::hidden('id', $students->person_id ) !!}   
                        {{Form::submit($students->id ,['class' => 'btn btn-link p-0 '])}}
                    {!! Form::close() !!}
                </td>
                <td>
                    {{ $students->full_name() }}
                    
                </td>
                <td>
                    
                    @forelse ($students->EnrolledProgramme as $course )
                        <div class='input-group'>    
                            <div class="group-prepend">
                                <span class="input-group-text p-1">{{ $course->Programme->name}}</span>
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
                    @forelse ($students->EnrolledProgramme as $course )
                        <div class="group-prepend">
                            <span class="input-group-text p-1">{{ $course->description}}</span>
                        </div>
                        
                    @empty
                        No Course yet
                    @endforelse
                

                </td>
                 <td>
                   
                        <a href="{{ route('goTo_enrollProgramme', [$students->id]) }}"
                           class='btn btn-default btn-xs'>
                            Add Programme
                        </a> 
                        
                </td> 
                <td>
                    {{-- units --}}
                    {{ $students->units }}
                </td>

                <td>
                    {{-- pre reg link --}}
                    <a href="{{ route('goTo_prereg', ['id' => $students->person_id]) }}"> {{ $students->id }} </a>
                </td>
                <td>
                    {{-- finance should have a table data like this to tag student as enrolled --}}
                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                  
                    @switch($students->isEnrolled)
                        @case(0)
                            {!! Form::hidden('isEnrolled', 1) !!}
                            {{Form::submit('Tag as Enrolled',['class' => 'btn btn-default'])}}
                            @break
                        @default
                            {!! Form::hidden('isEnrolled', 0) !!}
                            {{Form::submit('Enrolled',['class' => 'btn btn-success', 
                            'onclick' => "return confirm('Are you sure you want to unenroll student?')"])}}
                    @endswitch
                        
                    {!!Form::close()!!} 


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
            $('#enrollment-table').DataTable();
           
        } );
    </script>
@endpush
