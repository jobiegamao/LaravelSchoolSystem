<div class="table-responsive">
    <table class="table" id="payHistory-table">
            <thead>
                <tr>
                    <th>Transaction No.</th>
                    <th>Date</th>
                    <th>Semester</th>
                    <th>Remarks</th>
                    <th>Amount</th>
                    
                </tr>
            </thead>
        <tbody>
        {{-- Payments of Person --  Table --}}
        @foreach($person->Payments as $payment)
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

@push('scripts')
    <script
    src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#payHistory-table').DataTable();
           
        } );
    </script>
@endpush