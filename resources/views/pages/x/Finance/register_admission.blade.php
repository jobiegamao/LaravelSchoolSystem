@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Admission List</h1>
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        

        <div class="clearfix">@include('flash::message')</div>

        <div class="card">
            <div class="card-body p-0">
                @include('Finance.register_admission_table')

                <div class="card-footer">
                    
                </div>
            </div>

        </div>
    </div>

@endsection

