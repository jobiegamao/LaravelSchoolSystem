@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Registrar's List</h1>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
    <div class="content px-3">
        <div class="clearfix"> @include('flash::message')</div>
        <div class="card">
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table class="table" id="enrollment-table">
                        <thead>
                        <tr>
                            <th>Enrollment Status</th>
                            
                            <th>ID</th>
                            <th>SID</th>
                            <th>Name</th>
                            <th>Programme</th>
                            <th></th>
                            <th></th>
                            <th></th>

                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($students  as $students )
                            
                            <tr>
                                <td>
                                    {{-- finance should have a table data like this to tag student as enrolled --}}
                                    {!! Form::model($students, ['route' => ['student.update', $students->id], 'method' => 'patch']) !!}
                                  
                                    @switch($students->isEnrolled)
                                        @case(0)
                                            {!! Form::hidden('isEnrolled', 1) !!}
                                            {{Form::submit('Tag as Enrolled',['class' => 'btn btn-default btn-xs'])}}
                                            @break
                                        @default
                                            {!! Form::hidden('isEnrolled', 0) !!}
                                            {{Form::submit('Enrolled',['class' => 'btn btn-success btn-xs', 
                                            'onclick' => "return confirm('Are you sure you want to unenroll student?')"])}}
                                    @endswitch
                                        
                                    {!!Form::close()!!} 
                
                                </td>
        
                                <td>
                                    {{ $students->person_id }}
                                </td>
                                <td>
                                    {{ $students->id }}
                                </td>
                                <td>
                                    {{ $students->full_name() }}
                                    
                                </td>
                                <td>
                                    @forelse ($students->EnrolledProgramme as $course )
                                            <span class="p-1">{{ $course->Programme->name}}</span>
                                            <br>
                                    @empty
                                        No Course yet
                                    @endforelse
                                
                                </td>
                                <td>
                                    @forelse ($students->EnrolledProgramme as $course )
                                            <span class="p-1">{{ $course->description}}</span>
                                            <br>
                                    @empty
                                        No Course yet
                                    @endforelse
                                </td>
                                <td>
                                    {{-- curriculum --}}
                                    {!! Form::open(['method' => 'POST', 'route' => 'courseProgramme.show' ]) !!}
                                        {!! Form::hidden('id', $students->person_id ) !!}   
                                        {{Form::submit('Curriculum' ,['class' => 'btn btn-link p-0 '])}}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {{-- pre reg --}}
                                    {!! Form::open(['method' => 'POST', 'route' => ['goTo_prereg' , 'id' => $students->person_id ] ]) !!}
                                        {!! Form::hidden('id', $students->person_id ) !!}
                                        {!! Form::hidden('acadYear', \App\Models\AcadPeriod::latest()->value('acadYear') ) !!}
                                        {!! Form::hidden('acadSem', \App\Models\AcadPeriod::latest()->value('acadSem') ) !!}    
                                        {{Form::submit('Prereg' ,['class' => 'btn btn-link p-0 '])}}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    
                                    <a href="{{ route('balance', [$students->person_id]) }}"
                                        class='btn btn-link p-0'>
                                        balance
                                    </a> 
                                    
                                </td>
                                <td>
                                    <a href="{{ route('payment.show', [$students->person_id]) }}"
                                        class='btn btn-link p-0'>
                                         History
                                    </a> 
                                </td>
                                <td>
                                    <a href="{{ route('goTo_payment', [$students->person_id]) }}"
                                       class='btn btn-default btn-xs'>
                                        Add Payment
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
                
            </div>

        </div>


        <div class="">
            <a href="{{ route('student.unenroll') }}" class="btn btn-danger float-right"
            onclick ="return confirm('Are you sure you want to unenroll ALL students?')"
            >Restart Enrollment</a> 

            <a href="{{ route('update.dues') }}" class="btn btn-danger"
            onclick ="return confirm('All account due balance for the sem will be updated')"
            >Update Statement of Accounts</a> 
        </div>

    </div>
{{-- body --}}
@endsection

