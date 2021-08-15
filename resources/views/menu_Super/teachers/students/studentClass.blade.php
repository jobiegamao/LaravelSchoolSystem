@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Code: {{ $class->classCode }}</h1>
                    <h1>{{ $class->Course->subjCode }}</h1>
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
                <table class="table" id="classStudents-table">
                    <thead>
                    <tr>
                        
                        <th>SID</th>
                        <th>Name</th>
                        
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>PreFinal</th>
                        <th>Final Grade</th>
        
                    </tr>
                    </thead>
                    <tbody>
                    {{-- foreach studentClass  --}}
                   
                    @foreach ($s as $s)
                    
                        <td>{{ $s->Student->id }}</td>
                        <td>{{ $s->Student->full_name() }}</td>
                        
                        
                        <td> 
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                            {!! Form::number('prelimGrade',$s->ClassGrade->prelimGrade, ['class' => 'border-0 w-1', 'size' => 10]) !!}
                            <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                            {!!Form::close()!!}
                        </td>
                        <td>
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                            {!! Form::number('midtermGrade',$s->ClassGrade->midtermGrade, ['class' => 'border-0 w-1', 'size' => 10]) !!}
                            <a href="{{ route('classGrade.update', [$s->classGrade_id]) }}"></a>
                            {!!Form::close()!!}
                        </td>
                        <td>
                            {!! Form::model($s, ['route' => ['classGrade.update', $s->classGrade_id], 'method' => 'patch']) !!}
                            {!! Form::number('prefinalsGrade',$s->ClassGrade->prefinalsGrade, ['class' => 'border-0 w-1', 'size' => 10]) !!}
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
                       
                    } );
                </script>
@endpush

@endsection

       
        
        
        
        
        
        