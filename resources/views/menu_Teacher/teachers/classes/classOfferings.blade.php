@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1> Classes</h1>
                    <span>Instructor: {{ $classes[0]->Teacher->full_name()}}</span>
                    <hr>
                </div>
            </div>
            
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}
    <div class="content px-3">
        <div class="card">
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table class="table" id="teacherClasses-table">
                        <thead>
                        <tr>
                            <th>Year and Semester</th>
                            
                            <th>Class Code</th>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Schedule</th>
                            <th>Room</th>
                            <th><small><b>Reserved</b><br><b>Slots</b></small></th>
                            <th><small><b>Available</b><br><b>Slots</b></small></th>
                
                            <th>Students</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- foreach classoffering  --}}
                        @foreach($classes as $classes)
                            <tr>
                                
                                <td>
                                    {{ $classes->year }} sem: {{ $classes->semester }}
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
                                    {{ $classes->room }}
                
                                </td>
                                <td>
                                    {{ $classes->StudentCount() }}
                                </td>
                                <td>
                                    {{ 40 - $classes->StudentCount() }}
                
                                </td>
                                <td class="text-center">
                                
                                {!! Form::open(['method' => 'GET', 'route' => 'teacher.students' ]) !!}
                                    {!! Form::hidden('id', $classes->id) !!}
                                    {!! Form::hidden('tid', $classes->teacher_id) !!}
                                    {!! Form::button('<i class="fas fa-users"></i>', 
                                    ['type' => 'submit', 'class' => 'btn btn-link', ]) !!}
                                    {!! Form::close() !!}
                                </td>
                                
                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                
                
                
                
                
            </div>
        </div>
    </div>  
    {{-- /body --}}
</div>

@push('scripts')
                <script
                src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
                </script>
                <script>
                    $(document).ready( function () {
                        $('#teacherClasses-table').DataTable();
                       
                    } );
                </script>
@endpush

@endsection

       
        
        
        
        
        
        