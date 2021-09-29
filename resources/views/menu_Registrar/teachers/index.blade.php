@extends('layouts.app')

@section('content')
<div class="content px-3">
    {{-- header --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Teachers List</h1>
                        <div class="clearfix"> @include('flash::message')</div>
                    </div>
                </div>
                <hr>
            </div>
        </section>
    {{-- /header --}}

    {{-- body --}}
        <div class="content px-3">
            
            
            <div class="card">
                <div class="card-body p-10">
                    @include('menu_Registrar/teachers/table')
                </div>

            </div>


        </div>
    {{-- body --}}
</div>
@endsection

