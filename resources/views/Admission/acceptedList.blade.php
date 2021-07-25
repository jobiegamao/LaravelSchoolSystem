@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Accepted Admissions</h1>
                </div>

                <div class="col-sm-6">
                    
                </div>
                
            </div>
            <div class="clearfix">@include('flash::message')</div>
        </div>
    </section>

    

    <div class="content px-3">
        
        <div class="card">
            <div class="card-body p-0">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                
                            <th>Admission ID</th>
                            <th>Name</th>
                            <th>Register New Student ID</th>
                            <th>Registration Control No.</th>
                            
                    
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($person as $person)
                        
                            @if ($person->accepted_status == 1)
                                <tr>
                                
                                    <td> 
                                        <a href = "{{ route('admission.show', [$person->id]) }}"> {{ $person->id }} </a>
                                    </td>
                                    
                                    <td> {{ $person->name }}</td>
                                    
                                    
                                   @if ($person->registrationControlNO)
                                   
                                        <td width="300">
                                            <div class='btn-group'>
                                            <strong class="px-5">Registered</strong>
                
                                            {!! Form::open(['route' => ['register.destroy', $person->registrationControlNO->id], 'method' => 'delete']) !!}

                                            {!! Form::button('<i class="fas fa-window-close"></i>', 
                                            ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 
                                            'onclick' => "return confirm('Are you sure you want to deregister student? Student will lose registration ID')"]) 
                                            !!}
                                            {!! Form::close() !!}
                                            </div>
                                        </td>
                                        <td>{{ $person->registrationControlNO->id }}</td>
                                        
                                    @else
                                    <td width="300">
                                        <div class='px-5'>
                                            <a class="btn btn-default"
                                            href="{{ route('admission.createStudent', [$person->id]) }}">
                                            Register
                                            </a>
                                        </div>
                                    </td>
                                    <td> </td>
                                    @endif


                                    

                                    
                    
                                </tr>
                            @endif
                            
                        @endforeach

                       
                        </tbody>
                    </table>
                </div>
                
            </div>

        </div>
    </div>

@endsection




