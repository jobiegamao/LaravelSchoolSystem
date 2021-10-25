<div class="table-responsive">
    <table class="table" id="enrollment-table">
        <thead>
        <tr>
            <th>RGC</th>
            <th>ID</th>
            {{-- <th>SID</th> --}}
            <th>Name</th>
            <th>Units</th>
            <th>Programme</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($students  as $students )
            
            <tr>
                <td style="text-align: center;">
                    {{ $students->StudentUpdate[0]->id }}
                </td>
                <td>
                    {{ $students->person_id }}
                </td>
                {{-- <td>
                    {{ $students->id }}
                </td> --}}
                <td>
                    {{ $students->full_name() }}
                    
                </td>
                <td style="text-align: center;">
                    {{-- units --}}
                    {{ $students->StudentUpdate[0]->units }}
                </td>
                <td>
                    
                    @forelse ($students->EnrolledProgramme as $course )
                        <div class='input-group'>    
                            {{-- <div class="group-prepend">
                                <span class="input-group-text p-1">{{ $course->Programme->name}}</span>
                            </div> --}}
                            <span>{{ $course->Programme->name}}</span>
                            {!! Form::open(['route' => ['enrollProgramme.delete', $course->id], 'method' => 'delete']) !!}
                                {!! Form::hidden('student_id', $students->id ) !!}  
                                {!! Form::button('<i class="fas fa-times"></i>', 
                                ['type' => 'submit', 'class' => 'btn btn-x bg-transparent',
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
                        {{-- <div class="group-prepend">
                            <span class="input-group-text p-1">{{ $course->description}}</span>
                        </div> --}}
                        <div class='input-group'> 
                            <span class="pb-2">{{ $course->description}}</span>

                        </div>
                    @empty
                        No Course yet
                    @endforelse
                

                </td>
                 
                <td>
                    {{-- curriculum --}}
                    {!! Form::open(['method' => 'GET', 'route' => 'courseProgramme.show' ]) !!}
                        {!! Form::hidden('id', $students->person_id ) !!}   
                        {{Form::submit('Curriculum' ,['class' => 'btn btn-link p-0 '])}}
                    {!! Form::close() !!}
                </td>
                <td>
                    {{-- pre reg --}}
                    {!! Form::open(['method' => 'GET', 'route' => 'goTo_prereg'  ]) !!}
                    
                        {{ session()->forget('_old_input'); }}
                        {!! Form::hidden('id', $students->person_id ) !!} 
                        {!! Form::hidden('acadYear', \App\Models\AcadPeriod::latest()->value('acadYear') ) !!}
                        {!! Form::hidden('acadSem', \App\Models\AcadPeriod::latest()->value('acadSem') ) !!} 
                        {{Form::submit('Prereg' ,['class' => 'btn btn-link p-0 '])}}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['balance', 'id' => $students->person_id] ]) !!}
                        {!! Form::hidden('acadPeriod_id', \App\Models\AcadPeriod::latest()->value('id')) !!}
                        {{Form::submit('Balance',['class' => 'btn btn-link p-0'])}}
                    {!! Form::close() !!}
                </td>
                <td>
                    {{-- finance should have a table data like this to tag student as enrolled --}}
                    {!! Form::model($students, ['route' => ['update.enrollTag', $students->id], 'method' => 'patch']) !!}
                  
                    @switch($students->isEnrolled)
                        @case(0)
                            {!! Form::hidden('isEnrolled', 1) !!}
                            {{Form::submit('Tag as Enrolled',['class' => 'btn btn-info btn-xs'])}}
                            @break
                        @default
                            {!! Form::hidden('isEnrolled', 0) !!}
                            {{Form::submit('Enrolled',['class' => 'btn btn-success btn-xs', 
                            'onclick' => "return confirm('Are you sure you want to unenroll student?')"])}}
                    @endswitch
                        
                    {!!Form::close()!!} 


                </td>
                <td>
                   
                    <a href="{{ route('goTo_enrollProgramme', [$students->id]) }}"
                       class='btn btn-info btn-xs'>
                        Add Programme
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
            $('#enrollment-table').DataTable();
           
        } );
    </script>
@endpush
