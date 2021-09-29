<div class="table-responsive">
    <table class="table" id="acadPeriods-table">
        <thead>
        <tr>
            <th></th>
            <th>Semester</th>
            <th style="text-align: center; vertical-align: middle;">Academic Year</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($acadPeriods as $acadPeriod)
            <tr>
                <td>{{ $acadPeriod->id}}</td>
                <td>{{ $acadPeriod->acadSemText() }}</td>
                <td style="text-align: center;">{{ $acadPeriod->acadYear }}</td>
                <td width="120">

                    @if ($acadPeriod->id == $currentPeriod->id)
                    {!! Form::open(['route' => ['acadPeriods.destroy', $acadPeriod->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                            <a href="{{ route('acadPeriods.edit', [$acadPeriod->id]) }}"
                            class='btn btn-edit btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-delete btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
