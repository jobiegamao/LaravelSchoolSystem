@extends('layouts.app')

@section('content')

<div class="content px-3">
    {{-- header --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Class Code: {{ $class->classCode }}</h1>
                        <span>{{ $class->Course->subjCode }}</span>
                        <span>{{ $class->Course->subjName }}</span></br>
                        <span>Instructor: {{ $class->Teacher->full_name()}}</span>
                        <hr>
                        <div class="clearfix"> @include('flash::message')</div>
                    </div>
                    <div class="col-sm-2">
                        @role("Registrar")
                            {!! Form::open(['method' => 'POST', 'route' => 'teacher.report' , 'id' => 'submitForm']) !!}
                                    {!! Form::hidden('classOffering_id', $class->id) !!}
                                    {{Form::button('Update Grade Report',['class' => 'btn btn-primary', 
                                    'type' => 'submit', 'onclick' => "return confirm('WARNING: Submission of reports is irreversable. 
                                    Contact Registrar for changes after submission.')" ])}}
                            {!! Form::close() !!}
                        @endrole
                        
                    </div>
                </div>
            </div>
        </section>
    {{-- /header --}}

    {{-- body --}}
    <div class="content px-3">
            @php
                $acadPeriod_id = \App\Models\AcadPeriod::where('acadYear',$class->year )
                                                        ->where('acadSem', $class->semester)
                                                        ->value('id');
            @endphp
            {!! Form::open(['method' => 'GET','route' => 'teacher.loadClasses']) !!}
                {!! Form::hidden('acadPeriod_id', $acadPeriod_id) !!}
                {!! Form::hidden('teacher_id', $class->teacher_id) !!}
                {{Form::submit(' &larr; Back',['class' => 'btn btn-link'])}}
            {!! Form::close() !!}
        <div class="card">
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table class="table" id="classStudents-table">
                        <thead>
                        <tr>
                            
                            <th>SID</th>
                            <th>Name</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>3rd</th>
                            <th>Final Grade</th>
            
                        </tr>
                        </thead>
                        <tbody>
                        {{-- foreach studentClass  --}}
                    
                        @foreach ($s as $s)
                            <tr>
                            <td>{{ $s->Student->id }}</td>
                            <td>{{ $s->Student->full_name() }}</td>
                            <td> 
                                {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                                {!! Form::number('prelimGrade',$s->ClassGrade->prelimGrade, ['class' => 'border-0 w-1', 'size' => 10, 'id' => 'g1Form' ]) !!}
                                <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                                {!!Form::close()!!}
                            </td>
                            <td>
                                {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                                {!! Form::number('midtermGrade',$s->ClassGrade->midtermGrade, ['class' => 'border-0 w-1', 'size' => 10, 'id' => 'g2Form']) !!}
                                <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                                {!!Form::close()!!}
                            </td>
                            <td>
                                {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                                {!! Form::number('prefinalsGrade',$s->ClassGrade->prefinalsGrade, ['class' => 'border-0 w-1', 'size' => 10, 'id' => 'g3Form']) !!}
                                <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                                {!!Form::close()!!}
                            </td>
                
                            <td>
                                {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                                {!! Form::number('finalsGrade',$s->ClassGrade->finalsGrade, ['class' => 'border-0 w-1', 'size' => 10, 'id' => 'g4Form' ]) !!}
                                <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                
                
                
                
                
            </div>
        </div>
    </div>
    {{-- /body --}}
             
</div>

@push('scripts')
                <script
                src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
                </script>
                <script>
                    $(document).ready( function () {
                        $('#classStudents-table').DataTable();
                        var reported = {{ $reported }};
                        if(reported){
                            $("#submitForm :input").prop("disabled", true);
                            
                            $('[id=g1Form]').prop("disabled", true);
                            $('[id=g2Form]').prop("disabled", true);
                            $('[id=g3Form]').prop("disabled", true);
                            $('[id=g4Form]').prop("disabled", true);
                        }
                    } );
                </script>
                
@endpush

@endsection

       
        
        
        
        
        
        