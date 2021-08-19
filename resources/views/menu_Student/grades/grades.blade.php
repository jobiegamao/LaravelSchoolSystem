@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $student->full_name() }} Grades</h1>
                    <span> {{ $year }} Semester:{{ $sem }} </span>
                </div>
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
 
            <div class="card">
                <div class="card-body"> 
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Student ID: </label>
                        <div class="col-sm-10 form-control" readonly>{{ $student->id }} </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-sm-10 form-control" readonly>{{ $student->full_name()}} </div>   
                    </div>     
                    <div class="form-group row">
                        @forelse ($student->EnrolledProgramme as $ep )
                            <label class="col-sm-2 col-form-label">Programme: </label>
                            <div class="col-sm-2 form-control mb-3" readonly>{{ $ep->description }} </div>
                            <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->Programme->name}} </div>
                            <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->statusText()}} </div>
                        @empty
                            <span>not a student</span>
                        @endforelse
                        
                    </div>

                    {{-- BUTTONS--}}
                    
                        @php
                            $gradesAcadPeriod = App\Models\AcadPeriod::where('acadYear', $year)
                                        ->where('acadSem', $sem)->first();
                            $currPeriod = App\Models\AcadPeriod::latest()->first();
                            $nextPeriod = App\Models\AcadPeriod::find( ($gradesAcadPeriod->id) +1);
                            $prevPeriod = App\Models\AcadPeriod::find( ($gradesAcadPeriod->id) -1);
                        @endphp
                       
                        <div class="d-flex flex-row-reverse">
                            <!-- show next button if this is not the latest acadPeriod -->
                            @if(!($year == $currPeriod->acadYear && $sem == $currPeriod->acadSem))
                                <div class="p-2"> 
                                {!! Form::open(['method' => 'POST', 'route' => ['grades.show', 'id' => $student->id] ]) !!}
                                    {!! Form::hidden('changePeriod', true) !!}
                                    {!! Form::hidden('year', $nextPeriod->acadYear) !!}
                                    {!! Form::hidden('sem', $nextPeriod->acadSem) !!}
                                    {{Form::submit('Next &rarr;',['class' => 'btn btn-link'])}}
                                {!! Form::close() !!}
                                </div>
                            @endif
                            @if($prevPeriod != null)
                            <div class="p-2">
                                {!! Form::open(['method' => 'POST', 'route' => ['grades.show', 'id' => $student->id] ]) !!}
                                    {!! Form::hidden('changePeriod', true) !!}
                                    {!! Form::hidden('year', $prevPeriod->acadYear) !!}
                                    {!! Form::hidden('sem', $prevPeriod->acadSem) !!}
                                    {{Form::submit('&larr; Prev',['class' => 'btn btn-link'])}}
                                {!! Form::close() !!}
                            </div>
                            @endif
                        </div>
                    

                    {{-- table --}}
                    <div class="pt-3"> 
                        <div class="table-responsive">
                            <table class="table" id="mygrades-table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Class Code</th>
                                            <th>Subject Code</th>
                                            <th>Title</th>
                                            <th>Prelim</th>
                                            <th>Midterm</th>
                                            <th>Pre-final</th>
                                            <th>Final</th>
                                            <th>Units</th>

                                        </tr>
                                    </thead>
                                <tbody>
                                {{-- ClassOffering Table --}}
                                @foreach($classes as $class)
                                    <tr>
                                        <td>
                                            {{ $class->ClassOffering->classCode }}
                                        </td>
                                        <td>
                                            {{ $class->ClassOffering->subjCode }}
                                        </td>
                                        <td>
                                            {{ $class->ClassOffering->Course->subjName }}
                                        </td>
                                        <td>
                                            {{ $class->ClassGrade->prelimGrade }}
                                    
                                        </td>
                                        <td>
                                            {{ $class->ClassGrade->midtermGrade }}
                                    
                                        </td>
                                        <td>
                                            {{ $class->ClassGrade->prefinalsGrade }}
                                    
                                        </td>
                                        <td>
                                            {{ $class->ClassGrade->finalGrade() }}
                                    
                                        </td>
                                        <td>
                                            {{ $class->ClassOffering->Course->units}}
                                    
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
                                    $('#mygrades-table').DataTable();
                                   
                                } );
                            </script>
                        @endpush
                        
                    </div>
                    
                        
                        
                </div>
            
                
            </div>

            
    
             
</div>


@endsection

