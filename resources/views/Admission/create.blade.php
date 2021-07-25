@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add Admissions</h1>
                </div>
                
            </div>
            <div class="clearfix">@include('flash::message')</div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'admission.store']) !!}

            <div class="card-body">

                
                         
                <div class="form-group row">
                    {!! Form::label('id', 'Admission ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                    <input type="text" id="id" name="id" value="{{ \App\Http\Controllers\AdmissionController::getNextID() }}" class = "col-sm-10 form-control" readonly>
                </div>
                    @include('Admission.fields')
                

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admission.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
