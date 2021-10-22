@extends('layouts.app')
@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Update {{ $student->full_name() }} 's Programmes</h1>
            </div>
        </div>
    </div>
</section>


<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        
        {!! Form::model($student, ['route' => ['enrollProgramme.update', 'id' => $student->id], 'method' => 'patch']) !!}


        <div class="card-body" style="color:black">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID: </label>
                <div class="col-sm-10 form-control" readonly>{{ $student->person->id }} </div>
            </div>

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

                    <select class="prog_status col-sm-4 form-control mb-3" name="{{ $ep->id }}" style="width: 100%" >
                        <option {{ $ep->status == '0' ? 'selected' : '' }} value="0">Ongoing</option>
                        <option {{ $ep->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                        <option {{ $ep->status == '2' ? 'selected' : '' }} value="2">Hold</option>
                    </select>
                @empty
                    <p>not a student</p>
                @endforelse
                
            </div>

                
            @if ($student->StudentUpdateLatest != null)
                <div class="form-group row">
                    {!! Form::label('isGrad', 'Graduating Status:',array('class' => 'col-sm-2 col-form-label')) !!}
                    <div class="col-sm-10 pt-2">
                        {{ Form::checkbox('isGrad', null,  $student->StudentUpdateLatest->isGrad) }}
                    </div>
                </div>  
            @endif

        </div>

        <div class="card-footer">
            
            <a href="{{ route('goTo_promotionList.index') }}" class="btn btn-default float-right">Cancel</a>
            {!! Form::submit('Update', ['class' => 'btn btn-primary float-right mr-2']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
