@extends('layouts.app')

{{-- add student ID to enrollProgramme with
its chosen program ID from Prgram --}}

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Enroll New Student to Program</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'enrollProgramme.store']) !!}

            <div class="card-body">

                    <div class="form-group row">
                        {!! Form::label('person_id', 'Person ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                        <div class="col-sm-10 form-control" readonly>{{ $student->person_id }} </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('student_id', 'Student ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                        {!! Form::text('student_id', $student->id, ['class' => "col-sm-10 form-control", 'readonly']) !!}
                    </div>
                    <div class="form-group row">
                        {!! Form::label('name', 'Name:',array('class' => 'col-sm-2 col-form-label')) !!}
                        {!! Form::text('name', $student->full_name(), ['class' => "col-sm-10 form-control", 'readonly']) !!}
                    </div>

                    {{-- data fields in form request for adding course/programme --}}
                    @include('menu_Super/enrollment/fields')
                

            </div>

            <div class="card-footer">
                
                <a href="{{ route('goTo_enrollment.index') }}" class="btn btn-default float-right">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary float-right mr-2']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection