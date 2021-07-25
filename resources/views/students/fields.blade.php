
<!-- Student Id Field  -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Student Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
    <!-- Add hidden here since request form asks for student_id for student_courses table -->
    <input type="hidden" id="student_id" name="student_id" class="form-control" >
</div>

<!-- Admission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admission_id', 'Admission Id:') !!}
    {!! Form::number('admission_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
@php( $courses = \App\Models\Courses::all()) 
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {{-- CHANGE TO MULTIPLE SOON multiple="multiple"--}}
    <select class="js-example-responsive js-states form-control" id="course_id" name="course_id[]" data-live-search="true" style="width: 100%"  >
        @foreach($courses as $course)
            <option name="course_id" data-tokens="{{ $course->course_name }}" value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
    </select>
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



@push('scripts')
<!-- For Select Input Course Id Field -->
<script>
    $(document).ready(function() {
        $('#course_id').select2({
            theme: "classic"
        });
        
    });

    
    $("#Save").click(function() { 
        var x = document.getElementById("id").value;
  	    document.getElementById("student_id").value = x;
    }); 


</script>
@endpush










