@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Update Registering Admission</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($registerAdmission, ['route' => ['register.update', $registerAdmission->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- RegisterAdmission Id Field -->
                    <div class="col-sm-6">
                        {!! Form::label('id', 'Control NO:') !!}
                        
                        {!! Form::text('id', $registerAdmission->id , ['class' => "form-control" , 'disabled']) !!}
                    
                    @include('register_admission.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('register.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
