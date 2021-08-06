@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Student Pre Registration</h1>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}

    
        <div class="clearfix"> @include('flash::message')</div>
        <div class="card">
            <div class="card-body p-10">
                {{-- Search Student ID --}}
                {!! Form::open(['route' => 'courseProgramme.show']) !!}
                    <div class="input-group">
                        <input type="text" class="col-sm-4 form-control" name="id"
                            placeholder="Search Student ID (person id)" value="{{ old('id') }}" required> 

                        <input type="number" class="col-sm-4 form-control"  name="year" value="{{ old('year') }}"
                            placeholder="Enter School Year(YYYY)" required>

                        <select class="col-sm-4 form-control"" id="semester" name="semester" value="{{ old('semester') }}"
                            style="width:100%" data-style="btn-info" placeholder="Semester" required>
                                
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                        </select>
                            
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                        </span>

                        
                    </div>
                
               {{-- close is at after classoffering search para madala ang id,sem, and year --}}
               {!! Form::close() !!}
            </div>
        </div>

             <?php $person = Session::get('person'); ?>
             <?php $course = Session::get('course'); ?>
             <?php $year = Session::get('curryear'); ?>
             <?php $semester = Session::get('currsem'); ?>
            
            @if(isset($person))
                @include('menu_Super/addCourses/studentClass')
                @include('menu_Super/addCourses/classOfferings')
            @endif

             @if(isset($person))
             <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Student's Programme Courses</h1>
                        </div>
                        
                    </div>
                </div>
            </section>
             <div class="card">
                <div class="card-body p-10"> 
                    
                        <div class="form-group row">
                            {!! Form::label('person_id', 'Person ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                            <div class="col-sm-10 form-control" readonly>{{ $person->id }} </div>
                        </div>
                    
                        <div class="form-group row">
                            {!! Form::label('name', 'Name:',array('class' => 'col-sm-2 col-form-label')) !!}
                            {!! Form::text('name', $person->full_name(), ['class' => "col-sm-10 form-control", 'readonly']) !!}
                        </div>
                        <div class="form-group row">
                            @foreach ($person->Student->EnrolledProgramme as $courses )
                            
                                {!! Form::label('programme', 'Programme:',array('class' => 'col-sm-2 col-form-label')) !!}
                                {!! Form::text('programme', $courses->description , ['class' => "col-sm-2 form-control mb-3", 'readonly']) !!}
                                {!! Form::text('programme', $courses->Programme->name , ['class' => "col-sm-8 form-control mb-3", 'readonly']) !!}
                                
                            @endforeach
                        </div>


                        <div class="pt-3"> 
                            @include('menu_Super/addCourses/student_courses_table') 
                        </div>
                        
                        
                        
                </div>
               
            @endif
        </div>

           

             
    </div>


@endsection

