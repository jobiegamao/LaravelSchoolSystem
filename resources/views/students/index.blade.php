@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Enrolled New Students</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('students.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        
        <div class="clearfix">@include('flash::message')</div>
        <div class="card">
            <div class="card-body p-0">
                @include('students.table')

            </div>

        </div>
    </div>

@endsection

