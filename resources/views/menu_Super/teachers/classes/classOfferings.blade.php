@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $classes[0]->Teacher->full_name() }}'s Classes</h1>
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
            <div class="table-responsive">
                <table class="table" id="teacherClasses-table">
                    <thead>
                    <tr>
                        <th><small>Offering #</small></th>
                        <th>Year and Semester</th>
                        
                        
                        <th>Class Code</th>
                        <th>Subject Code</th>
                        <th>Subject Title</th>
                        <th>Schedule</th>
                        <th>Room</th>
                        <th><small>Reserved<br>Slots</small></th>
                        <th><small>Available<br>Slots</small></th>
            
                        <th>Students</th>
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
                            <td>
                               
                                <a href="{{ route('teacher.students', ['id' => $classes->id ]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
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
                        $('#teacherClasses-table').DataTable();
                       
                    } );
                </script>
@endpush

@endsection

       
        
        
        
        
        
        