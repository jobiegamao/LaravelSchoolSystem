@extends('layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add Payment</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => ['payment.store', 'id' => $person->id ]]) !!}

            <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID: </label>
                        {!! Form::text('person_id', $person->id, ['class' => "col-sm-10 form-control", 'readonly']) !!}
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Student No: </label>
                        <div class="col-sm-10 form-control" readonly>{{ $person->Student->id }} </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-sm-10 form-control" readonly>{{ $person->full_name()}} </div>   
                    </div>

                    @php( $acadPeriod = \App\Models\AcadPeriod::all())
                    <div class="form-group row">
                        {!! Form::label('acad_id', 'Academic Period:',array('class' => 'col-sm-2 col-form-label')) !!}
                        <div class="col-sm-10 form-control">
                            <select class="select2" style="width:100%" id="acadPeriod_id" name="acadPeriod_id" data-live-search="true" data-style="btn-info" required >
                                    <option></option>
                                    @foreach($acadPeriod as $acadPeriod)
                                        <option name="acadPeriod_id" data-tokens="{{ $acadPeriod->year }}" value="{{ $acadPeriod->id }}">{{ $acadPeriod->acadYear }} {{ $acadPeriod->acadSemText()}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Amount: </label>
                        {!! Form::number('amount', null, ['class' => "col-sm-10 form-control", 'step' =>"any", 'required']) !!}
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Remarks: </label>
                        {!! Form::textarea('description', null, ['class' => "col-sm-10 form-control"]) !!}
                    </div>


            </div>

            <div class="card-footer">
                
                <a href="{{ route('finance.index') }}" class="btn btn-default float-right">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary float-right mr-2']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('scripts')
<!-- For Select Input Field -->
<script>
    $(document).ready(function() {
        $('#acadPeriod_id').select2({
            width: 'resolve',
            theme: "bootstrap",
        });
        
        
    });

</script>
@endpush