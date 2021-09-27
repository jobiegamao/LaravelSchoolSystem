@extends('layouts.app')

@section('content')
{{-- header --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 style="color:#3c6b9b; font-weight:bold;">Extra Course Fees</h1>
                    <span style="font-size: smaller;">
                    Note: To update a course fee, click on fee, type, then enter.
                    </span>
                </div>
                <div class="col-sm-2">
                    <a class=" btn btn-primary float-right"
                        href="{{ route('finance.coursefeesCreate') }}">
                        Add New</a>
                </div>
                 
                <hr>
                    <div class="clearfix"> @include('flash::message')</div>
            </div>
            <hr>

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
                         
                        @foreach($cf as $c )
                            <tr>
                                <td>
                                    {{ $c->subjCode }}
                                </td>
                                <td>
                                    {{ $c->Course->subjName }}
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

