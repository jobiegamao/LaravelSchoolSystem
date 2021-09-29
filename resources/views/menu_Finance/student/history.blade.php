@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Payment History of {{ $person->full_name() }}</h1>
                    <hr>
                    
                </div>
                
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}
<div class="content px-3">
    <div class="card">
        <div class="card-body p-10">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID: </label>
                <div class="col-sm-10 form-control" readonly>{{ $person->id }} </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student No: </label>
                <div class="col-sm-10 form-control" readonly>{{ $person->Student->id }} </div>
            </div>
        
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-10 form-control" readonly>{{ $person->full_name()}} </div>
            </div>
            <div class="form-group row">
                @forelse ($person->Student->EnrolledProgramme as $ep )
                    <label class="col-sm-2 col-form-label">Programme: </label>
                    <div class="col-sm-2 form-control mb-3" readonly>{{ $ep->description }} </div>
                    <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->Programme->name}} </div>
                    <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->statusText()}} </div>
                @empty
                    <h1>no enrolled programme</h1>
                @endforelse
                
            </div>
            <div>
                <a href="{{ route('goTo_payment', [$person->id]) }}"
                    class='btn btn-info btn-xs'>
                     Add Payment
                 </a> 
            </div>
            
            {{-- table --}}
            <div class="pt-3"> 
                @include('menu_Finance/student/history_table')
            </div>
        </div>

        
        
    </div>
</div>
    
             
</div>


@endsection

       
        
        
        
        
        
        