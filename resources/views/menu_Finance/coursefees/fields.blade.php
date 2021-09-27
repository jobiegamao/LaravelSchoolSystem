

{!! Form::hidden('acadPeriod_id', \App\Models\AcadPeriod::latest()->value('id') ) !!}

<!-- course subj Field -->
@php( $course = \App\Models\Course::all())
<div class="form-group row">
    {!! Form::label('subjCode', 'Subject/Course Code:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">
        <div class="form-group row">
        <select class="select2" style="width:100%" id="subjCode" name="subjCode" data-live-search="true" data-style="btn-info" >
                <option value="none" selected disabled hidden>Select Course</option>
                @foreach($course as $course)
                    <option name="subjCode" data-tokens="{{ $course->subjCode }} {{ $course->subjCode }}" value="{{ $course->subjCode }}">{{$course->subjCode }} {{$course->subjName }}</option>
                @endforeach
        </select>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Lab Fee Amount: </label>
    {!! Form::number('labFee', null, ['class' => "col-sm-10 form-control", 'step' =>"any", 'min' => '0', 'required']) !!}
</div>



@push('scripts')
<!-- For Select Input program/Course Id Field -->
<script>
    $(document).ready(function() {
        $('#subjCode').select2({
            width: 'resolve',
            theme: "bootstrap",
            
        });
       
        
    });

</script>
@endpush