<div class="table-responsive">
    <table class="table" id="personDetails-table">
        <thead>
        <tr>
            <th>Person ID</th>
            <th>First Name</th>
            <th>Lname</th>
            <th>Mname</th>
            <th>Sname</th>
            <th>Birthdate</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personDetails as $personDetails)
            <tr>
            <td>{{ $personDetails->id }}</td>
            <td>{{ $personDetails->fname }}</td>
            <td>{{ $personDetails->lname }}</td>
            <td>{{ $personDetails->mname }}</td>
            <td>{{ $personDetails->sname }}</td>
            <td>{{ $personDetails->birthdate }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['personDetails.destroy', $personDetails->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personDetails.show', [$personDetails->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('personDetails.edit', [$personDetails->id]) }}"
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
