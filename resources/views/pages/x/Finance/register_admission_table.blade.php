<div class="table-responsive">
    <table class="table" id="registerAdmissions-table">
        <thead>
        <tr>

            <th>Finance Approval</th>
            <th>Control No.</th>
            <th>Admission Id</th>
            

            <th>Name</th>
            
            <th colspan="2">Course</th>
            
            <th>Acad Year</th>
            <th>Acad Sem</th>

            
            <th>Completion Status</th>

           
        </tr>
        </thead>
        <tbody>
        @foreach($person as $registerAdmission)
            <tr>
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
                    <a href = "{{ route('finance.enrollPayLog', [ 'id' => $registerAdmission->id ]) }}"> 
                        {{ $registerAdmission->id }} 
                    </a>
                </td>
                <td>{{ $registerAdmission->admission_id }}</td>

                <td>
                    {{ $registerAdmission->admission->personDetails->lname}} ,
                    {{ $registerAdmission->admission->personDetails->fname}}
                    {{ $registerAdmission->admission->personDetails->mname ?? ''}}
                    {{ $registerAdmission->admission->personDetails->sname ?? ''}}
                </td>
                
                <td colspan="2">
                    
                    {{ $registerAdmission->course1Name['course_name'] ?? ''}} <br>
                    {{ $registerAdmission->course2Name['course_name'] ?? ''}}
                       
                </td>
    
                <td>{{ $registerAdmission->acad_year }}</td>
                <td>{{ $registerAdmission->acad_sem }}</td>

                
                
                <td>
                    
                    @switch($registerAdmission->registration_status)
                        @case(1)
                        <i class="fas fa-check-circle" style="color:green" ></i>
                            @break
                        @default
                            PENDING
  
                    @endswitch
                </td>

               
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
