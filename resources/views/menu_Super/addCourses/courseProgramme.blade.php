@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>List of Subjects to take</h1>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
    <div class="content px-3">
        <div class="clearfix"> @include('flash::message')</div>
        <div class="card">
            <div class="card-body p-10">
                {{-- Search Student ID --}}
                {!! Form::open(['route' => 'courseProgramme.show']) !!}
                    <div class="input-group">
                        <input type="text" class="col-sm-5 form-control" name="id"
                            placeholder="Search Student ID (person id)"> 
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                    </div>
                {!! Form::close() !!}
             </div>  
             <div class="card-body p-10"> 
                @if(isset($course))

                
                    <div class="form-group row">
                        {!! Form::label('person_id', 'Person ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                        <div class="col-sm-10 form-control" readonly>{{ $person->id }} </div>
                    </div>
                   
                    <div class="form-group row">
                        {!! Form::label('name', 'Name:',array('class' => 'col-sm-2 col-form-label')) !!}
                        {!! Form::text('name', $person->full_name(), ['class' => "col-sm-10 form-control", 'readonly']) !!}
                    </div>
                    <div class="form-group row">
                        @foreach ($person->student->enrolledProgramme as $courses )
                        
                            {!! Form::label('programme', 'Programme:',array('class' => 'col-sm-2 col-form-label')) !!}
                            {!! Form::text('programme', $courses->description , ['class' => "col-sm-2 form-control mb-3", 'readonly']) !!}
                            {!! Form::text('programme', $courses->programme->name , ['class' => "col-sm-8 form-control mb-3", 'readonly']) !!}
                            
                        @endforeach
                    </div>


                    <div class="pt-3"> 
                        @include('menu_Super/addCourses/student_courses_table')
                    </div>
                    
                @endif
            </div>

        </div>
    </div>
{{-- body --}}
@endsection