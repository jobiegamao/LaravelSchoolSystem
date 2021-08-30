@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color:#3c6b9b;font-weight:bold">Class Offerings</h1>
                </div>
                
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="card">
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table id="classofferings-table" class="table table-striped table-bordered table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th><small>Offering #</small></th>
                                <th>Year</th>
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
                        <tfoot style="display: table-header-group ">
                            <tr>
                                <th><small>Offering #</small></th>
                                <th>Year</th>
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
                        </tfoot>
                        <tbody>
                        {{-- foreach classoffering  --}}
                        @foreach($classes as $classes)
                            <tr>
                                <td>
                                    {{ $classes->id }}
                                </td>
                                <td>
                                    {{ $classes->year }}
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
                                    {{ $classes->Teacher->full_name() }}
                            
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
                        // Setup - add a text input to each footer cell
                        $('#classofferings-table tfoot th').each( function () {
                            var title = $(this).text();
                            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                        } );
                    
                        // DataTable
                        var table = $('#classofferings-table').DataTable({

                            initComplete: function () {
                                // Apply the search
                                this.api().columns().every( function () {
                                    var that = this;
                    
                                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                        if ( that.search() !== this.value ) {
                                            that
                                                .search( this.value )
                                                .draw();
                                        }
                                    } );
                                } );
                            }
                        });
                    
                    } );
                        
                </script>
@endpush

@endsection

       
        
        
        
        
        
        