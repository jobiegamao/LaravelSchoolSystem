

      

@if ($course->isNotEmpty())
<div class="card-body">
    <div class="table-responsive">
        <table class="table" id="curriculum-table">
            <thead>
            <tr>
                <th>CP #</th>
                <th>Year Level</th>
                <th>Semester</th>
                <th>Code</th>
                <th>Title</th>
                
                <th>Units</th>
                <th>Final Grade</th>
                <th>Prerequisite</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            {{-- CourseProgramme Table --}}
            @foreach($course as $course)
                <tr>
                    <td> 
                        {{-- temp only  --}}
                        {{ $course->id }}
                    </td>
                    <td>
                        {{ $course->yearLevel }}
                    </td>
                    <td>
                        {{ $course->semester }}
                    </td>
                    <td>
                        {{ $course->subjCode }}
                    </td>
                    <td>
                        {{ $course->Course->subjName}}
                    </td>
                    <td>
                        {{ $course->Course->units }}
                    </td>
                    <td>
                        
                        @php
                            $subjCode = $course->subjCode;
                            $s = \App\Models\StudentClass::where('student_id', $person->Student->id)
                            ->whereHas('ClassOffering', function ($query) use($subjCode){
                                    $query->latest()->where('subjCode', '=',$subjCode);
                                })
                            ->with('ClassGrade')
                            ->has('ClassGrade')
                            ->first();
                            
                            if(!empty($s)){
                                echo($s->ClassGrade->finalGradeTEXT());
                            }
                           
                        @endphp

                        
                    </td>
                    <td>
                        
                        @php
                            foreach($course->CourseProgrammePrereq as $req){
                                $reqID = $req->prereq_course_programme_id;
                                $ID = \App\Models\CourseProgramme::where('id',$reqID)->value('subjCode');
                                echo($ID);
                            }
                            
                        @endphp
                        
                        
                    </td>
                    <td>
                    

                    </td>
                    

                </tr>
            @endforeach

            
            </tbody>
        </table>
    </div>
</div>
@endif


@if ($certOptions->isNotEmpty())
<div class="card-body">
    <div class="d-flex justify-content-center">
        <span>Available Classes For Certification</span>
    </div>
    <div class="table-responsive">
        <table class="table" id="certOptions-table">
            <thead>
            <tr>
                
                <th>Code</th>
                <th>Title</th>
                <th>Units</th>
                <th>Final Grade</th>
                <th>Prerequisite</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            {{-- EnrolledProgramme Table --}}
            @foreach($certOptions as $course)
                <tr>
                
                    <td>
                        {{ $course->subjCode }}
                    </td>
                    <td>
                        {{ $course->Course->subjName}}
                    </td>
                    <td>
                        {{ $course->Course->units }}
                    </td>
                    <td>
                        @php
                            $subjCode = $course->subjCode;
                            $s = \App\Models\StudentClass::where('student_id', $person->Student->id)
                            ->whereHas('ClassOffering', function ($query) use($subjCode){
                                    $query->latest()->where('subjCode', '=',$subjCode);
                                })
                            ->with('ClassGrade')
                            ->has('ClassGrade')
                            ->first();
                            
                            if(!empty($s)){
                                echo($s->ClassGrade->finalGradeTEXT());
                            }
                           
                        @endphp
                    </td>
                    <td>
                        {{--  --}}
                    </td>
                    <td>
                        
                        @php
                            foreach($course->CourseProgrammePrereq as $req){
                                $reqID = $req->prereq_course_programme_id;
                                $ID = \App\Models\CourseProgramme::where('id',$reqID)->value('subjCode');
                                echo($ID);
                            }
                            
                        @endphp
                        
                        
                    </td>
                    
                    

                </tr>
            @endforeach

            
            </tbody>
        </table>
    </div>  
</div>
@endif 




@push('scripts')
    <script
    src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#curriculum-table').DataTable();
            $('#certOptions-table').DataTable();
        } );
    </script>
@endpush
