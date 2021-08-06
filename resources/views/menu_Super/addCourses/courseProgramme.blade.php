@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Curriculum</h1>
                </div>
                <div class="col-sm-6 clearfix"> @include('flash::message')</div>
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    
        
        <div class="card">
            <div class="card-body p-10">
                {{-- Search Student ID --}}
                {!! Form::open(['route' => 'courseProgramme.show']) !!}
                    <div class="row">
                            
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="id"
                                    placeholder="Search Student ID (person id)" value="{{ old('id') }}" required> 
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                                    
                {!! Form::close() !!}
                        
                            {{-- to access compact returns --}}
                            @php
                                $person = Session::get('person');
                                $course = Session::get('course');
                                $cert = Session::get('certOptions');
                            @endphp
                            @if (isset($person))
                                <div class="col-6">
                                    <a class="btn btn-primary float-right"
                                    href="{{ route('goTo_prereg', ['id' => $person->id]) }}">
                                        Register Classes
                                    </a>
                                </div>
                            @endif
                            

                    </div>
            </div>
        </div>

             
            

             
             
             <div class="card">
                @if(isset($person))
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
                        {{-- ADD UNITS COUNTER --}}
                </div>
                <div class="pt-3"> 
                    @include('menu_Super/addCourses/courseProgramme_table') 
                </div>
                @endif
                
            </div>
        
           

             
    

</div>
@endsection

