@extends('layouts.app')

@section('content')
{{-- header --}}
<div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Payment History</h1>
                    <hr>
                    
                </div>
                
            </div>
        </div>
    </section>
    {{-- /header --}}

    {{-- body --}}

    <div class="card">
        <div class="card-body p-10">
            
            <div class="table-responsive">
                <table class="table" id="allpayHistory-table">
                        <thead>
                            <tr>
                                <th>Transact no.</th>
                                <th>Date</th>
                                <th>Semester</th>
                                <th>Name</th>
                                <th>Remarks</th>
                                <th>Amount</th>
                                
                            </tr>
                        </thead>
                    <tbody>
                    {{-- Payments of All --  Table --}}
                    @foreach($payments as $payment)
                        <tr>
                            <td>
                                {{ $payment->id }}
                            </td>
                            <td>
                                {{ $payment->created_at }}
                            </td>
                            <td>
                                {{ $payment->AcadPeriod->acadSemText() }}
                            </td>
                            <td>
                                {{ $payment->Person->full_name() }}
                            </td>
                            <td>
                                {{ $payment->description }}
                            </td>
                            <td>
                                {{ $payment->amount }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            
        </div>

        
        
    </div>

    
             
</div>


@endsection

@push('scripts')
                <script
                src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
                </script>
                <script>
                    $(document).ready( function () {
                        $('#allpayHistory-table').DataTable();
                       
                    } );
                </script>
@endpush
       
        
        
        
        
        
        