@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Course List and Fees</h1>
                    <hr>
                    <span style="font-style: italic; font-size: smaller;">
                        Note: To update a course fee, click on fee then enter.
                    </span>
                </div>
                
            </div>
        </div>
    </section>
{{-- /header --}}

{{-- body --}}
    <div class="content px-3">
        <div class="clearfix"> @include('flash::message')</div>
        <div class="card">
            <div class="card-body p-10">
                <div class="table-responsive">
                    <table class="table" id="courses-table">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Lab Fee</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($course  as $c )
                            <tr>
                                <td>
                                    {{ $c->subjCode }}
                                </td>
                                <td>
                                    {{ $c->subjName }}
                                </td>
                                <td>
                                    {!! Form::model($c, ['route' => 'finance.coursefeesUpdate', 'method' => 'patch']) !!}
                                    {!! Form::number('labFee',$c->labFee, ['class' => 'border-0 w-1', 'size' => 10,'step' => '0.01','min'=>'0']) !!}
                                    {!! Form::hidden('subjCode', $c->subjCode) !!}
                                    <a href="{{ route('finance.coursefeesUpdate') }}"></a>
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                
                
                
                @push('scripts')
                    <script
                    src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
                    </script>
                    <script>
                        $(document).ready( function () {
                            $('#courses-table').DataTable();
                           
                        } );
                    </script>
                @endpush
                
            </div>

        </div>


        

    </div>
{{-- body --}}
@endsection

