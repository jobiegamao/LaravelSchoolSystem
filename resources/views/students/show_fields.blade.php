<!--  Student ID Field -->
<div class="form-group row">
    {!! Form::label('id','Student ID:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $students->id }} </div>
</div>

<!--  Name Field -->
<div class="form-group row">
        {!! Form::label('name', 'Student Name:',array('class' => 'col-sm-2 col-form-label')) !!}
        <div class="col-sm-10 form-control">{{ $students->registration->admission['name'] }} </div>
</div>

<!-- High School Field -->
<div class="form-group row">
    {!! Form::label('School','High School:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $students->registration->admission['school'] }} </div>
</div>

<!-- Entrance Exam Field -->
<div class="form-group row">
    {!! Form::label('entrance_exam_grade', 'Entrance Exam Grade:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $students->registration->admission['entrance_exam_grade'] }} </div>
</div>

<!-- Course Field -->
<div class="form-group row">
    {!! Form::label('Courses', 'Courses:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">
        @forelse ($students->courseEnrolled as $course )
                | {{ $course->course_name }} |
        @empty
            "No Course"
        @endforelse
    </div>
</div>