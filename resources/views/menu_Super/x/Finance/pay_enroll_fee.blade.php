@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Enrollment Payment</h1>
            </div>
        </div>
    </div>
</section>
<div class="content px-3 ">

    <div class="card">

        <div class="card-body">
            //Enroll_pay_log table
        </div>

        <div class="card-footer">
            <a href="{{ route('finance.admissionList') }}" class="btn btn-default float-right">Cancel</a>
            <a href="" input class="btn btn-primary float-right mr-3" type="submit"> Record</a>
            
        </div>

        

    </div>
</div>
@endsection