<!-- Course Name Field -->
<div class="col-sm-12">
    {!! Form::label('course_name', 'Course Name:') !!}
    <p>{{ $courses->course_name }}</p>
</div>

<!-- Course Code Field -->
<div class="col-sm-12">
    {!! Form::label('course_code', 'Course Code:') !!}
    <p>{{ $courses->course_code }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $courses->description }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $courses->status }}</p>
</div>

