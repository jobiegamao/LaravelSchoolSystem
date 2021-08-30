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

            @if (Auth::user()->role == 'Registrar')
            <div class="card-body p-10">

                
                {{-- Search Student ID --}}
                        {!! Form::open(['method' => 'GET','route' => 'courseProgramme.show']) !!}
                    <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id"
                                        placeholder="Search ID" value="{{ $person->id  ?? old('id') }}" required> 
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>  
                            {!! Form::close() !!}
                        
                            @if (isset($person))
                                {!! Form::open(['method' => 'GET', 'route' => 'goTo_prereg'  ]) !!}
                                    {!! Form::hidden('id', $person->id ) !!}   
                                    {!! Form::hidden('acadYear', \App\Models\AcadPeriod::latest()->value('acadYear') ) !!}
                                    {!! Form::hidden('acadSem', \App\Models\AcadPeriod::latest()->value('acadSem') ) !!}
                                    {{Form::submit('Register Classes' ,['class' => 'btn btn-primary float-right'])}}
                                {!! Form::close() !!}
                            @endif
                            

                    </div>
            </div>
            @endif
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
                        
                </div>
                <div class="pt-3"> 
                    @include('menu_Registrar/addCourses/courseProgramme_table') 
                </div>
                @endif
                
            </div>
        
           

             
    

</div>
@endsection

