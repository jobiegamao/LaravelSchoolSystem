@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Offerings</h1>
                </div>
                <div class="col-sm-6">
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
            </div>
           
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="card">
        
        <div class="card-body p-10">
            <div class="table-responsive">
                <table class="table" id="classofferings-table">
                    <thead>
                    <tr>
                        <th><small>Offering #</small></th>
                        <th>Semester</th>
                        <th>Units</th>
                        
                        <th>Class Code</th>
                        <th>Subject Code</th>
                        <th>Subject Title</th>
                        <th>Schedule</th>
                        <th>Instructor</th>
                        <th>Room</th>
                        <th><small>Reserved<br>Slots</small></th>
                        <th><small>Available<br>Slots</small></th>
            
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- foreach classoffering  --}}
                    @foreach($classes as $classes)
                        <tr>
                            <td>
                                {{ $classes->id }}
                            </td>
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
                                {{ $classes->Teacher->full_name() }}
                        
                            </td>
                            <td>
                                {{ $classes->room }}
            
                            </td>
                            <td>
                                {{ $classes->StudentCount() }}
                            </td>
                            <td>
                                {{ 40 - $classes->StudentCount() }}
                            </td>
                            <td>
                               {{-- Button Add/Drop class code to StudentClass table --}}
                              @php
                                  $a = $student->StudentClass
                                       ->where('classOffering_id', $classes->id)
                                       
                              @endphp
                                
                                   @if ($course->contains('subjCode',$classes->subjCode) || $certOptions->contains('subjCode',$classes->subjCode) )
                                        @if (!$a->isEmpty())
                                            <form action="{{ route('studentClass.delete', [
                                                'student_id' => $student->id, 
                                                'classOffering_id' => $classes->id,
                                                'sem' => $classes->semester,
                                                'year' => $classes->year,
                                                'subjCode' => $classes->subjCode
                                                ]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" title="Delete">Drop</button>
                                            </form>
            
                                        @else
                                            @if( $classes->StudentCount() <= 40)
                                            {!! Form::open([ 'route' => 'studentClass.store', 'method' => 'POST' ]) !!}
                                                {!! Form::hidden('student_id', $student->id ) !!}
                                                {!! Form::hidden('classOffering_id', $classes->id) !!}
                                                {!! Form::hidden('sem', $classes->semester ) !!}
                                                {!! Form::hidden('year', $classes->year) !!}
                                                {{Form::submit('Add',['class' => 'btn btn-primary btn-sm'])}}
                                            {!! Form::close() !!}
                                            @endif
                                        @endif
                                   @endif
                                   
                               
                                
                            </td>
                            
            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            
            
            
            
        </div>
    </div>

    
             
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

@endsection

       
        
        
        
        
        
        