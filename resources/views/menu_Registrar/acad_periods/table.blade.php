<div class="table-responsive">
    <table class="table" id="acadPeriods-table">
        <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th>#</th>
            <th>Semester</th>
            <th>Academic Year</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($acadPeriods as $acadPeriod)
            <tr>
                <td style="text-align: center; vertical-align: middle;">{{ $acadPeriod->id}}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $acadPeriod->acadSemText() }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $acadPeriod->acadYear }}</td>
                <td style="text-align: center; vertical-align: middle;">
                    
                    <div class='btn-group'>
                        
                        <a href="{{ route('acadPeriods.edit', [$acadPeriod->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>

                        @if ($acadPeriod->id == $currentPeriod->id)
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
