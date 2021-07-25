@extends('layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Admission Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            
            {!! Form::model($person, ['route' => ['admission.update', $person->id], 'method' => 'patch']) !!}

            <div class="card-body">
                
                    @include('Admission.fields')
                
            </div>

            <div class="card-footer">
                {!! Form::submit('Accept', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admission.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
