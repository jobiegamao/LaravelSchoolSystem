@extends('layouts.app')

@section('content')
<div class="content px-3">
    {{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 style="color:#3c6b9b; font-weight:bold;">Academic Periods</h1>
                        <div class="clearfix"> @include('flash::message')</div>
                    </div>
                    <div>
                    </div>
                    <div>
                        <a class="btn btn-primary float-left"
                        href="{{ route('acadPeriods.create') }}">
                        Add New</a>
                    </div>
                </div>
                <hr>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                    <div class="row justify-content-md-left">
                        <div class="col-md-auto">
                            <label class="col-form-label">Current Academic Year:</label>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-control-plaintext">
                           {{  $currentPeriod->acadYear}} 
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-left">
                        <div class="col-md-auto">
                            <label class="col-form-label">Current Academic Semester:</label>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-control-plaintext">
                                {{ $currentPeriod->acadSemText() }}
                            </div>
                        </div>
                    </div>
                
            
            </div>


            <div class="card-body p-0">
                @include('menu_Registrar/acad_periods/table')
            </div>

        </div>
    </div>
    {{-- /body --}}
</div>
@endsection

