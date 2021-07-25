<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student Id:') !!}
    {!! Form::number('student_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course Id:') !!}
    {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acad_year', 'School Year:') !!}
    {!! Form::number('acad_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acad_sem', 'Semester:') !!}
    {!! Form::text('acad_sem', null, ['class' => 'form-control']) !!}
</div>