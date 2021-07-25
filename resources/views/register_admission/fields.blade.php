









<!-- Admission Id Field -->

    {!! Form::label('admission_id', 'Admission Id:') !!}
    {!! Form::number('admission_id', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-sm-6"></div>


<!-- Course Field -->
@php( $courses = \App\Models\Courses::all())

<div class="form-group col-sm-6 ">
    {!! Form::label('course_1', 'Course 1:') !!}
    <select class="course_select js-states form-control" id="course_1" name="course_1" data-live-search="true" style="width: 100%" >
        <option></option>
        @if (@isset($registerAdmission))
            @foreach($courses as $course)
            <option 
            name="course_1" data-tokens="{{ $course->course_name }}" 
            value="{{ $course->id }}" 
            {{ $registerAdmission->course_1 == $course->id ? 'selected' : '' }} >
                {{ $course->course_name }}
            </option>
            @endforeach
             
        @else 
            @foreach($courses as $course)
                    <option 
                    name="course_1" data-tokens="{{ $course->course_name }}" 
                    value="{{ $course->id }}" >
                        {{ $course->course_name }}
                    </option>
            @endforeach
        @endif
    </select>

    {!! Form::label('course_2', 'Course 2:') !!}
    <select class="course_select js-states form-control" id="course_2" name="course_2" data-live-search="true" style="width: 100%"" >
        <option></option>
        @if (@isset($registerAdmission))
            @foreach($courses as $course)
            <option 
            name="course_1" data-tokens="{{ $course->course_name }}" 
            value="{{ $course->id }}" 
            {{ $registerAdmission->course_2 == $course->id ? 'selected' : '' }} >
                {{ $course->course_name }}
            </option>
            @endforeach
             
        @else 
            @foreach($courses as $course)
                    <option 
                    name="course_2" data-tokens="{{ $course->course_name }}" 
                    value="{{ $course->id }}" >
                        {{ $course->course_name }}
                    </option>
            @endforeach
        @endif
    </select>
</div>

@push('scripts')
<!-- For Select Input Course Id Field -->
<script>
    $(document).ready(function() {
        $('.course_select').select2({
            theme: "classic",
            placeholder: "Select a Course",
            allowClear: true,
            

        });
        
    });

</script>
@endpush



<!-- Acad Year Field --><!-- Acad Sem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acad_year', 'Acad Year:') !!}
    {!! Form::number('acad_year', null, ['class' => 'form-control']) !!}
    {!! Form::label('acad_sem', 'Acad Sem:') !!}
    <select class="js-example-basic-single form-control" id="acad_sem" name="acad_sem" style="width: 100%"  >
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="Summer">Summer</option>
    </select>
</div>






<!-- Registration Status Field -->
<!-- Financeapproval Status Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('registration_status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('registration_status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('registration_status', 'Registration Status', ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::hidden('financeApproval_status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('financeApproval_status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('financeApproval_status', 'Financeapproval Status', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!--  From Admission fields -->

<div class="form-group col-sm-12">
    <div class="form-group row">
        {!! Form::label('name', 'Student Name:',array('class' => 'col-sm-2 col-form-label')) !!}
        {!! Form::text('name', $registerAdmission->admission->name, ['class' => "col-sm-10 form-control"]) !!}
    </div>
    
    <div class="form-group row">
        {!! Form::label('school', 'School:',array('class' => 'col-sm-2 col-form-label')) !!}
        {!! Form::text('school', $registerAdmission->admission->school, ['class' => "col-sm-10 form-control"]) !!}
    </div>

    <div class="form-group row">
        {!! Form::label('entrance_exam_grade', 'Entrance Exam Grade:',array('class' => 'col-sm-2 col-form-label')) !!}
        {!! Form::text('entrance_exam_grade', $registerAdmission->admission->entrance_exam_grade, ['class' => "col-sm-10 form-control"]) !!}
    </div>

    <div class="form-group row">
        {!! Form::label('course_choice', 'Initial Chosen Course:',array('class' => 'col-sm-2 col-form-label')) !!}
        {!! Form::text('course_choice', $registerAdmission->admission->course_choice, ['class' => "col-sm-10 form-control"]) !!}
    </div>

</div>

