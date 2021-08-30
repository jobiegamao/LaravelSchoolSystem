<!-- Acadsem Field -->
<div class="form-group row">
    {!! Form::label('acadSem', 'Academic Semester:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <select class="col-md-6 form-control"  name="acadSem" 
    style="width:100%" data-style="btn-info" placeholder="Semester" required>
        <option disabled></option>
        <option value="1">1st</option>
        <option value="2">2nd</option>
        <option value="3">Summer</option>
    </select>   
</div>

<!-- Acadyear Field -->
<div class="form-group row">
    {!! Form::label('acadYear', 'Academic Year:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    {!! Form::number('acadYear', null, ['class' => 'col-md-6 form-control']) !!}
</div>