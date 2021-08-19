<div class="table-responsive">
    <table class="table" id="acadPeriods-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Acadsem</th>
            <th>Acadyear</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($acadPeriods as $acadPeriod)
            <tr>
                <td>{{ $acadPeriod->id}}</td>
                <td>{{ $acadPeriod->acadSem }}</td>
                <td>{{ $acadPeriod->acadYear }}</td>
                <td width="120">
                    
                    <div class='btn-group'>
                        
                        <a href="{{ route('acadPeriods.edit', [$acadPeriod->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>

                        @if ($acadPeriod->acadSem == $current_sem && $acadPeriod->acadYear == $current_year)
                        {!! Form::open(['route' => ['acadPeriods.destroy', $acadPeriod->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                        @endif
                       
                    </div>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
