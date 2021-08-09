@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Pre Registration</h1>
                </div>
                <div class="col-sm-6">
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}


    @if(!isset($person))
        <div class="card">
            <div class="card-body p-10">
                
                {{-- Search Student ID --}}
                {!! Form::open(['route' => 'goTo_prereg']) !!}
                    <div class="input-group">
                        <input type="text" class="col-sm-4 form-control" name="id"
                            placeholder="Search Student ID (person id)" value="{{ old('id') }}" required> 

                        <input type="number" class="col-sm-4 form-control"  name="acadYear" value="{{ old('acadYear') }}"
                            placeholder="Enter School Year(YYYY)" required>
                        {{-- default value of acad sem not yet working --}}
                        <select class="col-sm-4 form-control""  name="acadSem" 
                            style="width:100%" data-style="btn-info" placeholder="Semester" required>
                                
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">Summer</option>
                        </select>
                            
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                        </span>

                        
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    @endif

    @if(isset($student))
            <div class="card">
                <div class="card-body p-10">
                    {{-- Search Student ID --}}
                    
                    {!! Form::open(['route' => 'goTo_prereg']) !!}
                        <div class="input-group">
                            <input type="text" class="col-sm-4 form-control" name="id"
                                placeholder="Search Student ID (person id)" value="{{ $person->id }}" required> 

                            <input type="number" class="col-sm-4 form-control"  name="acadYear" value="{{ old('acadYear') }}"
                                placeholder="Enter School Year(YYYY)" required>

                            <select class="col-sm-4 form-control""  name="acadSem" 
                                style="width:100%" data-style="btn-info" placeholder="Semester" required>
                                    <option disabled"></option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">Summer</option>
                            </select>
                                
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                            </span>

                            
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
    
           
                
            <div class="card">
                <div class="card-body"> 
                    
                        <div class="form-group row">
                            {!! Form::label('person_id', 'Person ID:',array('class' => 'col-sm-2 col-form-label')) !!}
                            <div class="col-sm-10 form-control" readonly>{{ $person->id }} </div>
                        </div>
                    
                        <div class="form-group row">
                            {!! Form::label('name', 'Name:',array('class' => 'col-sm-2 col-form-label')) !!}
                            {!! Form::text('name', $person->full_name(), ['class' => "col-sm-10 form-control", 'readonly']) !!}
                        </div>
                        <div class="form-group row">
                            @forelse ($student->EnrolledProgramme as $courses )
                            
                                {!! Form::label('programme', 'Programme:',array('class' => 'col-sm-2 col-form-label')) !!}
                                {!! Form::text('programme', $courses->description , ['class' => "col-sm-2 form-control mb-3", 'readonly']) !!}
                                {!! Form::text('programme', $courses->Programme->name , ['class' => "col-sm-8 form-control mb-3", 'readonly']) !!}
                            @empty
                                <p>not a student</p>
                            @endforelse
                            
                        </div>

                        <div class="form-group row">
                            {{-- {!! Form::label('units', 'Units:',array('class' => 'col-sm-2 col-form-label')) !!} --}}
                            {{-- {!! Form::text('units',$student->units , ['class' => "col-sm-10 form-control", 'readonly']) !!} --}}
                            <div class="col-sm-2 col-form-label">
                                Total units
                            </div>
                            <div class="col-sm-2 col-form-label">
                                
                                
                                
                                
                                 {{ $student->unitsTook }}/ {{ $student->units }} 
                            </div>

                        </div>


                        {{-- ADD TO PRE REG --}}
                       
                        <div class="d-flex align-items-end flex-column" style="height:50px;">   
                            <a href="{{ route('goTo_classOfferings', ['id' => $student->id]) }}"
                            class='btn btn-success'>
                            Add Class
                            </a> 
                        </div>
                        <div class="d-flex align-items-end flex-column" style="height:20px;">
                            <small>Note: You can only add class for current academic period</small>
                        </div>     
                            
                            
                        
                        
                        <div class="pt-3"> 
                            @include('menu_Super/addCourses/studentClass_table')
                        </div>
                        
                        
                        
                </div>
            
                
            </div>

            
    @endif
             
</div>


@endsection

