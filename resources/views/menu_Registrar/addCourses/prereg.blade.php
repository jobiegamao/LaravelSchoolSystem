@extends('layouts.app')

@section('content')
<div class="content px-3">
    {{-- header --}}

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="color:#3c6b9b;font-weight:bold">Student Pre Registration</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="clearfix"> @include('flash::message')</div>
                    </div>
                    
                </div>
                <hr>
            </div>
        </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="content px-3">
        @role('Registrar')
        {!! Form::open(['method' => 'GET', 'route' => ['goTo_enrollment.index'] ]) !!}
            {{Form::submit(' &larr; Enrollees',['class' => 'btn btn-link p-0'])}}
        {!! Form::close() !!}
        @endrole
        @role('Finance')
        {!! Form::open(['method' => 'GET', 'route' => ['finance.index'] ]) !!}
            {{Form::submit(' &larr; Back',['class' => 'btn btn-link p-0'])}}
        {!! Form::close() !!}
        @endrole
            @php
                $currentYear = \App\Models\AcadPeriod::latest()->value('acadYear');
                $currentSem = \App\Models\AcadPeriod::latest()->value('acadSem');
            @endphp
            @if(Auth::user()->role != 'Student')
                <div class="card">
                    <div class="card-body p-10">
                        {{-- Search Student ID --}}
                        <div class="form-group row">
                            <label class="col-sm-12"><h4>Search Registration</h4> </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ID </label>
                            <label class="col-sm-2 col-form-label">Year</label>
                            <label class="col-sm-2 col-form-label">Semester </label>
                        </div>
                        
                        {!! Form::open(['method' => 'GET','route' => 'goTo_prereg']) !!}
                            <div class="input-group" style="text-align: center">
                                <input class="col-sm-2 form-control"  type="text" name="id"
                                    placeholder="Search ID" value="{{ $person->id  ?? old('id') }}" required> 

                                <input class="col-sm-2 form-control"  type="number"  name="acadYear" value="{{ old('acadYear') ?? $currentYear }}"
                                    placeholder="Enter School Year(YYYY)" required>


                                <select class="col-sm-2 form-control"  name="acadSem" 
                                    style="width:100%" data-style="btn-info" placeholder="Semester" required>
        
                                        <option {{ ( old('acadSem') ?? $currentSem) == '1' ? 'selected' : '' }} value="1">1st</option>
                                        <option {{ ( old('acadSem') ?? $currentSem ) == '2' ? 'selected' : '' }} value="2">2nd</option> 
                                        <option {{ ( old('acadSem') ?? $currentSem ) == '0' ? 'selected' : '' }} value="0">Summer</option> 
                                </select>
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info">
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
                    <div class="card-body"> 
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID: </label>
                                <div class="col-sm-10 form-control" readonly>{{ $student->person->id }} </div>
                            </div>
                
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Student ID: </label>
                                <div class="col-sm-10 form-control" readonly>{{ $student->id }} </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Reg Control No: </label>
                                <div class="col-sm-10 form-control" readonly>{{ $student->StudentUpdate[0]->id }} </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name: </label>
                                <div class="col-sm-10 form-control" readonly>{{ $student->full_name()}} </div>
                            </div>
                            <div class="form-group row">
                                @forelse ($student->EnrolledProgramme as $ep )
                                    <label class="col-sm-2 col-form-label">Programme: </label>
                                    <div class="col-sm-2 form-control mb-3" readonly>{{ $ep->description }} </div>
                                    <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->Programme->name}} </div>
                                    <div class="col-sm-4 form-control mb-3" readonly>{{ $ep->statusText()}} </div>
                                @empty
                                    <h2>no enrolled programme</h2>
                                @endforelse
                                
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <labeL>Total Units For Sem:</label>
                                </div>
                                <div class="col-sm-2 col-form-label">
                        
                                    {{ $student->StudentUpdate[0]->unitsTook }}/{{ $student->StudentUpdate[0]->units }} 
                                </div>
                            </div>

                            {{-- BUTTONS--}}
                            <div class="d-flex">
                                {{-- GO BACK TO CURRICULUM --}}
                                <div class="align-items-start flex-column">
                                    <div class="btn text-left" style="height:50px;">   
                                        
                                        {!! Form::open(['method' => 'GET', 'route' => 'courseProgramme.show' ]) !!}
                                            {!! Form::hidden('id', $student->person_id ) !!}   
                                            {{Form::submit('&larr; Curriculum',['class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                                @role("Student|Registrar")
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
                                @endrole
                            </div>

                            
                            {{-- table --}}
                            <div class="pt-3"> 
                                @include('menu_Registrar/addCourses/studentClass_table')
                            </div>
                        
                            
                            
                    </div>
                
                    
                </div>

                
            @endif
    </div>
            
             
</div>


@endsection

