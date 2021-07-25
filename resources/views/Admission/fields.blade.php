




<!--  Person ID -->
<div class="form-group row">
        {!! Form::label('person_details_id', 'Person ID:',array('class' => 'col-sm-2 col-form-label')) !!}
        {!! Form::number('person_details_id', null, ['class' => "col-sm-10 form-control"]) !!}
</div>


<!-- School Field -->
<div class="form-group row">
    {!! Form::label('school', 'School:',array('class' => 'col-sm-2 col-form-label')) !!}
    {!! Form::text('school', null, ['class' => "col-sm-10 form-control"]) !!}
</div>


<div class="form-group row">
    {!! Form::label('entrance_exam_grade', 'Entrance Exam Grade:',array('class' => 'col-sm-2 col-form-label')) !!}
    {!! Form::text('entrance_exam_grade', null, ['class' => "col-sm-10 form-control"]) !!}
</div>


<div class="form-group row">
    {!! Form::label('course_choice', 'Chosen Course:',array('class' => 'col-sm-2 col-form-label')) !!}
    {!! Form::text('course_choice', null, ['class' => "col-sm-10 form-control"]) !!}
</div>

<div class="form-group row">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        <label class="input-group-text" for="accepted_status">Admission Status</label>
        </div>
        <select class="custom-select" name="accepted_status" id="accepted_status" data-style="btn-info">
        
        <option disabled="disabled">select one option</option>
        

        @if (@isset($person))
        <option value="0" {{ $person->accepted_status == 0 ? 'selected' : '' }}>Pending</option>
        <option value="1" {{ $person->accepted_status == 1 ? 'selected' : '' }}>Accept</option>
        <option value="2"{{ $person->accepted_status == 2 ? 'selected' : '' }}>Reject</option>
        @else
        <option value="0" >Pending</option>
        <option value="1" >Accept</option>
        <option value="2">Reject</option>
        @endif

        </select>
    </div>
</div>

  




