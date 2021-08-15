@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Offerings</h1>
                </div>
                <div class="col-sm-6">
                    <div class="clearfix"> @include('flash::message')</div>
                </div>
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="card">
        <div class="card-body p-10">
            {!! Form::open(['route' => 'classOfferings.show']) !!}
            <div class="input-group">
                <input type="number" class="col-sm-4 form-control"  name="year" value="{{ old('year') }}"
                                    placeholder="Enter School Year(YYYY)" required>
                
                <select class="col-sm-4 form-control""  name="sem" 
                    style="width:100%" data-style="btn-info" placeholder="Semester" required>
                    
                        <option disabled"></option>
                        <option {{ old('sem') == '1' ? 'selected' : '' }} value="1">1st</option>
                        <option {{ old('sem') == '2' ? 'selected' : '' }} value="2">2nd</option> 
                        <option {{ old('sem') == '3' ? 'selected' : '' }} value="3">Summer</option> 
                </select>

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
            </div>

            {!! Form::close() !!}
        </div>
        
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table class="table" id="classofferings-table">
                        <thead>
                        <tr>
                            <th><small>Offering #</small></th>
                            <th>Semester</th>
                            <th>Units</th>
                            
                            <th>Class Code</th>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Schedule</th>
                            <th>Instructor</th>
                            <th>Room</th>
                            <th><small>Reserved<br>Slots</small></th>
                            <th><small>Available<br>Slots</small></th>
                
                        
                        </tr>
                        </thead>
                        <tbody>
                        {{-- foreach classoffering  --}}
                        @foreach($classes as $classes)
                            <tr>
                                <td>
                                    {{ $classes->id }}
                                </td>
                                <td>
                                    {{ $classes->semester }}
                                </td>
                                <td>
                                    {{ $classes->Course->units }}
                                </td>
                                <td>
                                    {{ $classes->classCode }}
                                </td>
                                <td>
                                    {{ $classes->subjCode }}
                                </td>
                                <td>
                                    {{ $classes->Course->subjName }}
                                </td>
                                <td>
                                    {{ $classes->schedule }}
                                </td>
                                <td>
                                    {{ $classes->teacher_id }}
                            
                                </td>
                                <td>
                                    {{ $classes->room }}
                
                                </td>
                                <td>
                                    
                                    {{ $classes->StudentCount() }}
                                </td>
                                <td>
                                
                                    {{ 40 - $classes->StudentCount() }}
                
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
        
    </div>

    
             
</div>

@push('scripts')
                <script
                src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
                </script>
                <script>
                    $(document).ready( function () {
                        $('#classofferings-table').DataTable();
                       
                    } );
                </script>
@endpush

@endsection

       
        
        
        
        
        
        