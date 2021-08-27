@extends('layouts.app')

@section('content')
<section class="content-header" style="padding-top: 8%">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-10 col-md-offset-1">
                <span>Profile Settings</span>
                <img src ="/dist/dp/{{ $user->dp }}" 
                    style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
                <h1>{{ $user->name }}'s Profile</h1>
                <label class="mt-4">Update Display Picture</label>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <input type="file" name="dp">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row mt-1">
                        <input type="submit" class="btn btn-sm btn-primary" style="width:200px;">
                    </div>
                    
                </form>

            </div>
            
        </div>
    </div>
</section>


<div class="clearfix"> @include('flash::message')</div>
<div class="content px-3">

    <div class="card">

        <div class="card-body">
            <span>{{ $user->role }} Account</span>
            <div class="col-md-10 col-md-offset-1">
                
            </div>
        </div>


        <div class="card-body p-0">
            
        </div>

    </div>
</div>
@endsection