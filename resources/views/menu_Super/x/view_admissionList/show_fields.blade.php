

<div class="form-group row">
    {!! Form::label('id', 'Admission ID:', array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $person->id }} </div>
</div>

<!--  Name Field -->
<div class="form-group row">
        {!! Form::label('name', 'Student Name:',array('class' => 'col-sm-2 col-form-label')) !!}
        <div class="col-sm-10 form-control">
            {{ $person->personDetails->lname }},
            {{ $person->personDetails->fname }}
            {{ $person->personDetails->mname ?? '' }}
            {{ $person->personDetails->sname ?? '' }}
        </div>
</div>


<!-- School Field -->
<div class="form-group row">
    {!! Form::label('school', 'School:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $person->school }} </div>
</div>


<div class="form-group row">
    {!! Form::label('entrance_exam_grade', 'Entrance Exam Grade:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $person->entrance_exam_grade }} </div>
</div>


<div class="form-group row">
    {!! Form::label('course_choice', 'Chosen Course:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">{{ $person->course_choice }} </div>
</div>


  




