@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Teacher List</h1>
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
    <div class="content px-3">
        
        
        <div class="card">
            <div class="card-body p-10">
                @include('menu_super/teachers/table')
            </div>

        </div>


    </div>
{{-- body --}}
@endsection

