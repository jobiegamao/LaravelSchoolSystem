<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $studentCourses->student_id }}</p>
</div>

<!-- Course Id Field -->
<div class="col-sm-12">
    {!! Form::label('course_id', 'Course Id:') !!}
    <p>{{ $studentCourses->course_id }}</p>
</div>

<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('acad_year', 'School Year Course Registered:') !!}
    <p>{{ $studentCourses->acad_year }}</p>
</div>

<!-- Sem Field -->
<div class="col-sm-12">
    {!! Form::label('acad_sem', 'Semester Course Registered:') !!}
    <p>{{ $studentCourses->acad_sem }}</p>
</div>
