<!-- RegisterAdmission Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Control NO:') !!}
    <p>{{ $registerAdmission->id }}</p>
</div>


<!-- Admission Id Field -->
<div class="col-sm-12">
    {!! Form::label('admission_id', 'Admission Id:') !!}
    <p>{{ $registerAdmission->admission_id }}</p>
</div>

<!-- Registration Status Field -->
<div class="col-sm-12">
    {!! Form::label('registration_status', 'Registration Status:') !!}
    <p>{{ $registerAdmission->registration_status }}</p>
</div>

<!-- Financeapproval Status Field -->
<div class="col-sm-12">
    {!! Form::label('financeApproval_status', 'Financeapproval Status:') !!}
    <p>{{ $registerAdmission->financeApproval_status }}</p>
</div>

<!-- Course 1 Field -->
<div class="col-sm-12">
    {!! Form::label('course_1', 'Course 1:') !!}
    <p>{{ $registerAdmission->course1Name['course_name'] ?? ''}}</p>
</div>

<!-- Course 2 Field -->
<div class="col-sm-12">
    {!! Form::label('course_2', 'Course 2:') !!}
    <p>{{ $registerAdmission->course2Name['course_name'] ?? ''}}</p>
</div>

<!-- Acad Year Field -->
<div class="col-sm-12">
    {!! Form::label('acad_year', 'Acad Year:') !!}
    <p>{{ $registerAdmission->acad_year }}</p>
</div>

<!-- Acad Sem Field -->
<div class="col-sm-12">
    {!! Form::label('acad_sem', 'Acad Sem:') !!}
    <p>{{ $registerAdmission->acad_sem }}</p>
</div>

