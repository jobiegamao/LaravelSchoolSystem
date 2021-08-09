@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Periods</h1>
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('acadPeriods.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">

            <div class="card-body">
               
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <label class="col-form-label">Current Academic Year:</label>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-control-plaintext">
                           {{  $current_year }} 
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <label class="col-form-label">Current Academic Semester:</label>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-control-plaintext">
                                @switch($current_sem)
                                @case(1)
                                    1st
                                    @break
                                @case(2)
                                    2nd
                                    @break
                                @default
                                    Summer
                                @endswitch
                            </div>
                            
                        </div>
                    </div>
                
            
            </div>


            <div class="card-body p-0">
                @include('menu_Super/acad_periods/table')
            </div>

        </div>
    </div>

@endsection

