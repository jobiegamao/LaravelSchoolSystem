@extends('layouts.app')

@section('content')
<div class="content px-3">
    {{-- header --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Search Teacher's Classes</h1>
                        <span>
                            Instructor: {{ $teacher->full_name() }}
                        </span>
                        <div class="clearfix"> @include('flash::message')</div>
                    </div>
                </div>
                <hr>
                
            </div>
        </section>
    {{-- /header --}}

    {{-- body --}}
        <div class="content px-3">
            @role("Registrar")
            {!! Form::open(['method' => 'GET', 'route' => ['teacher.list'] ]) !!}
            {{Form::submit(' &larr; Professors',['class' => 'btn btn-link p-0'])}}
            {!! Form::close() !!}
            @endrole
            <div class="card">
                <div class="card-body p-10">
                    {!! Form::open(['method' => 'GET','route' => 'teacher.loadClasses']) !!}
                    @php( $acadPeriod = \App\Models\AcadPeriod::all()->sortByDesc("id"))
                    <div class="form-group row">
                        {!! Form::label('acad_id', 'Academic Period:',array('class' => 'col-sm-2 col-form-label')) !!}
                        <div class="col-sm-5 form-control">
                            <select class="select2" style="width:100%" id="acadPeriod_id" name="acadPeriod_id" data-live-search="true" data-style="btn-info" required >
                                    <option></option>
                                    @foreach($acadPeriod as $acadPeriod)
                                        <option name="acadPeriod_id" data-tokens="{{ $acadPeriod->year }}" value="{{ $acadPeriod->id }}">{{ $acadPeriod->acadYear }} {{ $acadPeriod->acadSemText()}}</option>
                                    @endforeach
                            </select>
                        </div>
                        {!! Form::hidden('teacher_id', $teacher->id ) !!}
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>  
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>


        </div>
    {{-- body --}}
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