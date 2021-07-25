@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register Admission Details</h1>
                </div>
                
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('register.index') }}">
                        Back
                    </a>
                </div>
            </div>
            <div class="clearfix">@include('flash::message')</div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('register_admission.show_fields')
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('register.index') }}" class="btn btn-default float-right">Cancel</a>
                
                <a class="btn btn-primary float-right mr-3"
                    href="{{ route('students.enrollID', [$registerAdmission->id]) }}">
                    Enroll Student
                </a>
            </div>
            
        </div>
    </div>
@endsection
