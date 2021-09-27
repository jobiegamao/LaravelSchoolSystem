@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="color:#3c6b9b;font-weight:bold">Class Code: {{ $class->classCode }}</h1>
                    <span>{{ $class->Course->subjCode }}</span>
                    <span>{{ $class->Course->subjName }}</span></br>
                    <span>Instructor: {{ $class->Teacher->full_name()}}</span>
                    <hr>
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
                <div class="col-sm-2">
                    @if (Auth::user()->role == 'Teacher')
                        {!! Form::open(['method' => 'POST', 'route' => 'teacher.report' , 'id' => 'submitForm']) !!}
                                {!! Form::hidden('classOffering_id', $class->id) !!}
                                {{Form::button('Submit Grade Report',['class' => 'btn btn-primary btn', 
                                'type' => 'submit', 'onclick' => "return confirm('WARNING: Submission of reports is irreversable. 
                                Contact Registrar for changes after submission.')" ])}}
                        {!! Form::close() !!}
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

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
                    
                        <td>{{ $s->Student->id }}</td>
                        <td>{{ $s->Student->full_name() }}</td>
                        
                        <td> 
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch', 'id' => 'g1Form']) !!}
                            {!! Form::number('prelimGrade',$s->ClassGrade->prelimGrade, ['class' => 'border-0 w-1', 'size' => 10]) !!}
                            <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                            {!!Form::close()!!}
                        </td>
                        <td>
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch', 'id' => 'g2Form']) !!}
                            {!! Form::number('midtermGrade',$s->ClassGrade->midtermGrade, ['class' => 'border-0 w-1', 'size' => 10]) !!}
                            <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                            {!!Form::close()!!}
                        </td>
                        <td>
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch', 'id' => 'g3Form']) !!}
                            {!! Form::number('prefinalsGrade',$s->ClassGrade->prefinalsGrade, ['class' => 'border-0 w-1', 'size' => 10, ]) !!}
                            <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                            {!!Form::close()!!}
                        </td>
               
                        <td>
                            {{ $s->ClassGrade->finalGrade() }}
                        </td>
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
                        $('#classStudents-table').DataTable();
                        var reported = {{ $reported }};
                        if(reported){
                            $("#submitForm :input").prop("disabled", true);
                            $("#g1Form :input").prop("disabled", true);
                            $("#g2Form :input").prop("disabled", true);
                            $("#g3Form :input").prop("disabled", true);
                        }
                    } );
                </script>
                
@endpush

@endsection

       
        
        
        
        
        
        