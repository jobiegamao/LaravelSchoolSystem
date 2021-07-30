<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
        <tr>
            <th>Description</th>
        <th>Role Code</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $roles)
            <tr>
                <td>{{ $roles->description }}</td>
            <td>{{ $roles->role_code }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['roles.destroy', $roles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$roles->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('roles.edit', [$roles->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
