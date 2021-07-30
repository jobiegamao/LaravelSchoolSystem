<div class="table-responsive">
    <table class="table" id="index_table" class="table table-striped table-bordered table-sm" cellspacing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($person as $person)
            @if ($person->accepted_status != 1)
            <tr>
                <td> 
                    <a href = "{{ route('admission.show', [$person->id]) }}"> {{ $person->id }} </a>
                </td>

                <td> 
                    {{ $person->personDetails->lname }},
                    {{ $person->personDetails->fname }}
                    {{ $person->personDetails->mname ?? '' }}
                    {{ $person->personDetails->sname ?? '' }}
                 </td>
                

                <td>


                    @switch($person->accepted_status)
                
                        @case(2)
                            Rejected
                            @break
                        @default
                            Pending
                    @endswitch
                    
                
                
                </td>

                <td width="120">

                        {!! Form::open(['route' => ['admission.destroy', $person->id], 'method' => 'delete']) !!}
                        

                        <div class='btn-group'>
                            

                            <a href="{{ route('admission.edit', [$person->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>

                            {!! Form::button(
                                '<i class="far fa-trash-alt"></i>',
                                 ['type' => 'submit', 
                                 'class' => 'btn btn-danger btn-xs', 
                                 'onclick' => "return confirm('Are you sure?')"]) 
                            !!}
                        </div>
                        {!! Form::close() !!}
                </td>


            </tr>
            @endif
            
        @endforeach
        </tbody>
    </table>
</div>







