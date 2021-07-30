<!-- Classroom Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classroom_name', 'Classroom Name:') !!}
    {!! Form::text('classroom_name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Classroom Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classroom_code', 'Classroom Code:') !!}
    {!! Form::text('classroom_code', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Classroom Status Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('classroom_status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('classroom_status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('classroom_status', 'Classroom Status', ['class' => 'form-check-label']) !!}
    </div>
</div>
