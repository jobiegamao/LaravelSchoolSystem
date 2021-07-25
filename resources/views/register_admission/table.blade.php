<div class="table-responsive">
    <table class="table" id="registerAdmissions-table">
        <thead>
        <tr>
            <th>Admission Id</th>
            <th>Control No.</th>

            <th>Name</th>
            
            <th colspan="2">Course</th>
            
            <th>Acad Year</th>
            <th>Acad Sem</th>

            <th>Finance Approve</th>
            <th>Registration Completed</th>

            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($person as $registerAdmission)
            <tr>
                <td>{{ $registerAdmission->admission_id }}</td>
                <td>{{ $registerAdmission->id }}</td>

                <td>{{ $registerAdmission->admission->name }}</td>
                
                <td colspan="2">
                    
                    {{ $registerAdmission->course1Name['course_name'] ?? ''}} <br>
                    {{ $registerAdmission->course2Name['course_name'] ?? ''}}
                       
                </td>
    
                <td>{{ $registerAdmission->acad_year }}</td>
                <td>{{ $registerAdmission->acad_sem }}</td>

                
                <td>
                    @switch($registerAdmission->financeApproval_status)
                        @case(1)
                        <i class="fas fa-check-circle" style="color:green" ></i>
                            @break
                        @default
                            PENDING
  
                    @endswitch
                    
                </td>
                <td>
                    
                    @switch($registerAdmission->registration_status)
                        @case(1)
                        <i class="fas fa-check-circle" style="color:green" ></i>
                            @break
                        @default
                            PENDING
  
                    @endswitch
                </td>

                <td width="120">
                    {!! Form::open(['route' => ['register.destroy', $registerAdmission->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('register.show', [$registerAdmission->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('register.edit', [$registerAdmission->id]) }}"
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
