 @extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>{{ $student->full_name() }} Grades</h1>
                    <hr>
                    <span> S.Y. {{ $acadPeriod->acadYear }} {{ $acadPeriod->acadSemText() }}</span>
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
                            $currPeriod = App\Models\AcadPeriod::latest()->first();
                            $nextPeriod = App\Models\AcadPeriod::find( ($acadPeriod->id) +1);
                            $prevPeriod = App\Models\AcadPeriod::find( ($acadPeriod->id) -1);
                        @endphp
                       
                        <div class="d-flex flex-row-reverse">
                            <!-- show next button if this is not the latest acadPeriod -->
                            @if(!($acadPeriod->acadYear == $currPeriod->acadYear && $acadPeriod->acadSem== $currPeriod->acadSem))
                                <div class="p-2"> 
                                {!! Form::open(['method' => 'GET', 'route' => ['grades.show', 'id' => $student->id] ]) !!}
                                    {!! Form::hidden('changePeriod', true) !!}
                                    {!! Form::hidden('acadPeriod_id', $nextPeriod->id) !!}
                                    {{Form::submit('Next &rarr;',['class' => 'btn btn-link'])}}
                                {!! Form::close() !!}
                                </div>
                            @endif
                            @if($prevPeriod != null)
                            <div class="p-2">
                                {!! Form::open(['method' => 'GET', 'route' => ['grades.show', 'id' => $student->id] ]) !!}
                                    {!! Form::hidden('changePeriod', true) !!}
                                    {!! Form::hidden('acadPeriod_id', $prevPeriod->id) !!}
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
                                            <th>QPI</th>
                                            <th>Units</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                
                                @php
                                    $grades = array();
                                @endphp

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

                                            @php
                                                $n = $class->ClassGrade->finalGradeQPI();
                                                echo($n);
                                                $e = $n * $class->ClassOffering->Course->units;
                                                array_push($grades, $e);
                                                
                                            @endphp

                                        </td>
                                        <td>
                                            {{ $class->ClassOffering->Course->units}}
                                        </td>
                                         
                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right;">
                                            <strong>Quality Point Index (Q.P.I) = </strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            @php
                                                $sum = array_sum($grades);
                                                if(!empty($student->StudentUpdate[0])){
                                                    $totalUnits = $student->StudentUpdate[0]->unitsTook;
                                                    if($totalUnits != 0){
                                                        echo($sum / $totalUnits);
                                                    }
                                                    
                                                }else {
                                                        echo(0);
                                                    }
                                            @endphp
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
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

