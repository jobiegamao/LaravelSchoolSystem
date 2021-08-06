@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search Class Code</h1>
                </div>
                <div class="col-sm-6">
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="card">
        <div class="card-body p-10">
        {!! Form::open(['route' => 'classOfferings.show']) !!}
        <div class="input-group">
            <input type="text" class="col-sm-3 form-control" name="subjCode"
                placeholder="Search Course Code (Subject Code)" value="{{ old('subjCode') }}" required> 
            
            {!! Form::hidden('id', $student->id ) !!}

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
        </div>

        {!! Form::close() !!}
        </div>
            {{-- to access compact returns --}}
            @php
            $classes = Session::get('classes');
            @endphp

        <div class="card-body p-10">
            @if(isset($classes))
                @include('menu_Super/addCourses/class_offerings_table')
            @endif
        </div>
    </div>

    
             
</div>


@endsection

       
        
        
        
        
        
        