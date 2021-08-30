@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="color:#3c6b9b;font-weight:bold">Students List</h1>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
    <div class="content px-3">
        <div class="clearfix"> @include('flash::message')</div>
        <div class="card">
            <div class="card-body p-10">
                @include('menu_super/promotionList/table')
            </div>

        </div>

        <div class="card-footer">
            <a href="{{ route('student.unpromote') }}" class="btn btn-danger float-right"
            onclick ="return confirm('Are you sure you want to unpromote ALL students?')"
            >    
                Unpromote All </a>
        </div>
        

    </div>
{{-- body --}}
@endsection

