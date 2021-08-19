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
            <div class="row">
                <a href="{{ route('goTo_enrollment.index') }}"
                    class='btn btn-link'>
                    &larr; Student List
                </a>
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}


@php
    $currentYear = \App\Models\AcadPeriod::latest()->value('acadYear');
    $currentSem = \App\Models\AcadPeriod::latest()->value('acadSem');
@endphp
            <div class="card">
                <div class="card-body p-10">
                    {{-- Search Student ID --}}
                    
                    {!! Form::open(['route' => 'goTo_prereg']) !!}
                        <div class="input-group">
                            <input type="text" class="col-sm-4 form-control" name="id"
                                placeholder="Search ID" value="{{ $person->id  ?? old('id') }}" required> 

                            <input type="number" class="col-sm-4 form-control"  name="year" value="{{ old('year') ?? $currentYear }}"
                                placeholder="Enter School Year(YYYY)" required>

                            <select class="col-sm-4 form-control""  name="sem" 
                                style="width:100%" data-style="btn-info" placeholder="Semester" required>
    
                                    <option {{ ( old('sem') ?? $currentSem) == '1' ? 'selected' : '' }} value="1">1st</option>
                                    <option {{ ( old('sem') ?? $currentSem ) == '2' ? 'selected' : '' }} value="2">2nd</option> 
                                    <option {{ ( old('sem') ?? $currentSem ) == '0' ? 'selected' : '' }} value="0">Summer</option> 
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
    
           
        @if(isset($student))    
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
                                <h1>no enrolled programme</h1>
                            @endforelse
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label">
                                <labeL>Total Units For Sem:</label>
                            </div>
                            <div class="col-sm-2 col-form-label">
                    
                                 {{ $student->unitsTook }}/{{ $student->units }} 
                            </div>
                        </div>

                        {{-- BUTTONS--}}
                        <div class="d-flex">
                            {{-- GO BACK TO CURRICULUM --}}
                            <div class="align-items-start flex-column">
                                <div class="btn text-left" style="height:50px;">   
                                    
                                    {!! Form::open(['method' => 'POST', 'route' => 'courseProgramme.show' ]) !!}
                                        {!! Form::hidden('id', $student->person_id ) !!}   
                                        {{Form::submit('&larr; Curriculum',['class' => 'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            {{-- ADD CLASS --}}
                            <div class="ml-auto p-2">
                                <div class="d-flex align-items-end flex-column" style="height:50px;">   
                                    <a href="{{ route('goTo_classOfferings', ['id' => $student->id]) }}"
                                    class='btn btn-primary'>
                                    Add Class &rarr;
                                    </a> 
                                </div>
                                <div class="d-flex align-items-end flex-column" style="height:20px;">
                                    <small>Note: You can only add class for current academic period</small>
                                </div> 

                            </div>
                        </div>

                        
                        {{-- table --}}
                        <div class="pt-3"> 
                            @include('menu_Super/addCourses/studentClass_table')
                        </div>
                    
                        
                        
                </div>
            
                
            </div>

            
    @endif
             
</div>


@endsection

