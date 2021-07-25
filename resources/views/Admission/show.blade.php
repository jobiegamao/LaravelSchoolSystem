@extends('layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Admission Details</h1>
                </div>

                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('admission.index') }}">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                

                    @include('Admission.show_fields')
                    
                    
                    @if (!($person->registrationControlNO))    
                    {!! Form::model($person, ['route' => ['admission.update', $person->id], 'method' => 'patch']) !!}
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    
                                    <label class="input-group-text" for="accepted_status" >Admission Status</label>
                                    </div>
                                    
                                        <select class="custom-select" name="accepted_status" id="accepted_status" data-style="btn-info">
                                        <option disabled="disabled">select one option</option>
                                        
                                        <option value="0" {{ $person->accepted_status == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ $person->accepted_status == 1 ? 'selected' : '' }}>Accept</option>
                                        <option value="2" {{ $person->accepted_status == 2 ? 'selected' : '' }}>Reject</option>
                                        </select>
                                    
                                </div>
                            </div>
                    
                    @endif
                    
                   
                </div>
                <div class="card-footer">
                    
                    <a href="javascript:history.back()" class="btn btn-default float-right">Cancel</a>
                    {!! Form::submit('Confirm', ['class' => 'btn btn-primary float-right mr-3']) !!}
                
                </div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection


