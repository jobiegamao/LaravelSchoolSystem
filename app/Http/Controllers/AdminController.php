<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash, Response, Validator, Input, Redirect, Rule;

// add models that will be used in this controller
use App\Models\Person; 
use App\Models\Student; 
use App\Models\EnrollProgramme; 
use App\Models\CourseProgramme; 
use App\Models\CourseProgrammePreReq; 
use App\Models\ClassOffering; 
use App\Models\ClassGrade; 
use App\Models\StudentClass; 
use App\Models\AcadPeriod; 

use Illuminate\Support\Facades\DB;



// Functions to be used by Admin/Registrar View

class AdminController extends Controller
{

    /**
     * to enrollment list table
     * 
     * 
     */
    public function goTo_enrollmentList(Request $request)
    {
        
        $students = Student::where('isPass', '1')->orderBy('updated_at','asc')->get();
        
        return view('menu_Super/enrollment/index')
            ->with('students', $students);
    }

    /**
     * to enrollment list table
     * 
     * 
     */
    public function goTo_promotionList(Request $request)
    {
       // $students = Student::where('isEnrolled', '1')->orderBy('updated_at','asc')->get();
       $students = Student::orderBy('updated_at','asc')->get();
        return view('menu_Super/promotionList/index')
            ->with('students', $students);
    }

    /**
     * Show student details
     * 
     * 
     */
    public function studentShow($id) //not yet routed/done
    {
        $student = Student::find($id);

        return view('menu_Super/enrollment/show')
            ->with('student', $students);
    }
    /**
     * Update student enrollment details
     * 
     * 
     */
    public function studentUpdate(Request $request, $id)
    {
        
        $student = Student::where('id',$id);
        //dd($request->all());
        
        $student->update(request()->except(['_token','_method']),$id);
        if($request->has('isPass')){
            $this->studentUpdateUnits();
        }
        Flash::success('Student Updated Successfully.');

        return back();
    }
    /**
     * Tag As Enrolled
     * isEnrolled
     * 
     */
    public function studentEnroll(Request $request, $id)
    {
        $student = Student::where('id',$id);
       
        $student->update(request()->except(['_token','_method']),$id);
        Flash::success('Student Enrollment Tagged Successfully.');

        return back();
    }

    /**
     * Update all units in enrollment list 
     * units will  be based on course description for every minor + 6 , cert +3
     * major will be based on curriculum
     */
    public function studentUpdateUnits()
    {
       

       //-- current academic period --// 
       $acadSem = AcadPeriod::latest()->value('acadSem');

       // get all students who is passed and has curriculum. 

       $student= Student::with('CourseProgramme')->get();
       foreach($student as $s){
           $unitsCounter = 0;
            foreach($s->EnrolledProgramme as $ep){
                //echo($ep);
                if($ep->status == 0){
                    switch($ep->description){
                        case 'Certificate':
                            $unitsCounter+= 3;
                            break;
                        case 'Minor':
                            $unitsCounter+= 6;
                            break;
                        default:
                            //this formula  if naka base sa curric
                            // foreach($s->CourseProgramme as $cp){
                            //     if($cp->yearLevel == $s->year && $cp->semester == $acadSem){
                            //         $unitsCounter+= $cp->Course->units;
                                    
                            //     }
                            // }

                            // this if ay given lang per sem
                            $unitsCounter+= 15;
                            break;
                        
                    }
                } 
            }

            if($s->isPass == '0'){
                $unitsCounter = 0;
            }

            $s->units = $unitsCounter;
            $s->save();
            
       }

       return;
        
    }
    /**
     * Tag all as not enrolled 
     * isEnrolled
     * 
     */
    public function studentUnenrollAll()
    {
        $student = Student::where('isEnrolled','1')->update(['isEnrolled' => '0']);
 
        Flash::success('Students are all tagged as unenrolled for the new semester');

        return back();
    }
    /**
     * Tag all as not yet promoted, every new semester
     * isPass == false so registrar will have to decide if
     * student should be alllowed to be enrolled
     * 
     */
    public function studentUnpromoteAll()
    {
        $student = Student::where('isPass','1')->update(['isPass' => '0', 'units' => '0', 'unitsTook' => '0']);
 
        Flash::success('Students are all tagged as unpromoted for the new semester');

        return back();
    }



    /**
     * delete student ID
     * 
     * 
     */

    public function studentDelete($id)
    {
        $student = Student::find($id);
        
        $student->delete($id);

        Flash::success('Student deleted successfully.');

        return back();
    }

    public function enrollProgrammeEdit($id){
        $student = Student::find($id);
        return view('menu_Super.enrollment.enrollProgramme.edit', [
            'student' => $student
        ]);
    }

   /**
     * Update program status
     * 
     * 
     */
    public function enrollProgrammeUpdate(Request $request){
        $status_arr = request()->except(['_token','_method','id']);
        foreach($status_arr as $id => $status){
            EnrollProgramme::where('id',$id)
            ->update(['status' => $status] );
        }
        
        Flash::success('Programme Updated Successfully.');
        return redirect()->route('goTo_promotionList.index');
    }




    public function goTo_enrollProgramme($id)
    {
        $student = Student::find($id);
        return view('menu_Super/enrollment/enrollProgramme/enrollProgramme')
            ->with('student', $student);
    }

    
    /**
     * Save form in enrollProgramme
     * store == save
     * to validate form from rules in model
     * $validatedData = $request->validate(MODELNAME::$rules);
     */
    public function enrollProgrammeStore(Request $request)
    {
        $validatedData = $request->validate(EnrollProgramme::$rules);
        EnrollProgramme::create($validatedData);
        $this->studentUpdateUnits();
       

        Flash::success('Programme Enrolled successfully.');
        return redirect('/students/enrolling-list');
    }

    /**
     * Delete table from enrollProgramme
     */

    public function enrollProgrammeDelete($id){
        $q = EnrollProgramme::find($id);
        $q->delete($id);
        $this->studentUpdateUnits();

        Flash::success('Student unenrolled to programme successfully.');

        return redirect()->back();
    }


    /**
     * CourseProgramme
     */

    public function goTo_courseProgramme()
    {
        return view('menu_Super/addCourses/courseProgramme');
    }

    /**
     * show curriculum
     */
    
    public function courseProgrammeShow(Request $request)
    {
        $person = Person::find($request->id);
        $studentID = Student::where('person_id', $request->id)->value('id');

        if (empty($person) || empty($studentID)) {
            Flash::error('ID not found');

            return redirect(route('goTo_courseProgramme'))->withInput();
        }

        $course = $this->currCourse($studentID);
        $certOptions = $this->currCertOptions($studentID);
    
        
                

        return view('menu_Super/addCourses/courseProgramme', [
            'person' => $person,
            'course' => $course,
            'certOptions' => $certOptions
            ])
        ;
    

    }

    public function currCourse($studentID){
        //Get Curriculum  for Major or/and Minor                                                                               
        $enrolledProg = Student::find($studentID)->EnrolledProgramme
                                                 ->where('status', '0');
                                                 //get only curriculum of ongoing program

        $i=0; // major and minor counter
        foreach ($enrolledProg as $enrolledProg){
            $year = CourseProgramme::where('progCode', $enrolledProg->progCode,)->max('yearImplemented');
            
            
            switch($enrolledProg->description){
                case 'Major':
                    
                    $a = $enrolledProg->CourseProgramme->where('yearImplemented', $year);
                    break;
                
                case 'Minor': 
                    $a = $enrolledProg->CourseProgramme->where('isProfessional', '1')->where('yearImplemented', $year);
                    
                    break;

                default:
                    
                    break;
            }

            
            if($enrolledProg->description != 'Certificate'){
                if($i > 0){
                    $course = $course->merge($a);
                }else{
                    $course = $a;
                }
                $i++;
            }
            
            
            
            
        }  

        if(!empty($course)){
            $course = $course->unique('subjCode'); //list of subjects to take. Curriculum ProgrammeCourses
        }else{
            $course = collect();
        }
        
        //dd($course);
        return $course;
    }

    public function currCertOptions($studentID){
        //Get Curriculum                                                                                 
        $enrolledProg = Student::find($studentID)->EnrolledProgramme
                                                 ->where('status', '0');
                                                 //get only curriculum of ongoing program

        
        $j=0; // cert counter
        
        foreach ($enrolledProg as $enrolledProg){
            $year = CourseProgramme::where('progCode', $enrolledProg->progCode,)->max('yearImplemented');
            
            
            if ($enrolledProg->description == 'Certificate' ){
        
                $b = $enrolledProg->CourseProgramme->where('isProfessional', '1')->where('yearImplemented', $year);
                if($j > 0){
                    $certOptions = $certOptions->merge($b);
                }else{
                    $certOptions = $b;
                }
                $j++;
            }
 
        }  

        
        if(!empty($certOptions)){                             //will not include in curriculum but will be displayed
            $certOptions = $certOptions->unique('subjCode'); // list of subjects as options to a cert programme
        }else{
            $certOptions = collect();
        }

        
        return $certOptions;
    }


    public function goTo_prereg(Request $request){
        $acadYear = AcadPeriod::latest()->value('acadYear');
        $acadSem = AcadPeriod::latest()->value('acadSem');
        $reqYear = $request->acadYear;
        $reqSem =$request->acadSem;

        session()->flashInput($request->input());
        //if opened without values. like opening it thru the menu
        if(empty($request->all())){
            return view('menu_Super/addCourses/prereg');
        }
          
        $person = Person::find($request->id);
        $studentID = Student::where('person_id', $request->id)->value('id');
        $student = Student::find($studentID);

        if (empty($person) || empty($student)) {
            Flash::error('ID not found');

            return redirect(route('goTo_prereg'))->withInput();
        }
        

        
        //Get and show Classes Registered for sem and year
            $prereg = ClassOffering::with(['StudentClass' =>
                function ($query) use($studentID){
                $query->where('student_id', '=',$studentID);
                }])
                ->whereHas('StudentClass', function ($query) use($studentID){
                    $query->where('student_id', '=',$studentID);
                    })
                ->where('year', $reqYear ?? $acadYear)
                ->where('semester', $reqSem ?? $acadSem)       
                ->get();
// echo($prereg);
 //dd($prereg);



        if($request->has('fromStudClassDelete')){
                Flash::success('Class has been dropped');
        }
        //dd($student);
        return view('menu_Super/addCourses/prereg', [
            'person' => $person,
            'student' => $student,
            'prereg' => $prereg

        ]);
        
    }


    public function goTo_classOfferings(Request $request){
        $student = Student::find($request->id);
        $studentID = $request->id;
        $acadYear = AcadPeriod::latest()->value('acadYear');
        $acadSem = AcadPeriod::latest()->value('acadSem');
        
        //curriculum of student (CourseProgramme)
        $course = $this->currCourse($studentID);
        $certOptions = $this->currCertOptions($studentID);

        $classes = ClassOffering::
        where('year',$acadYear )
        ->where('semester', $acadSem )
        ->get();


        //error message is from studentClassStore. that method returns to this
        //route, and brings request->error when
        //  added class is error
        if($request->has('error')){
            switch ($request->error) {
                case 'Prereq':
                    Flash::error('Class code has a prerequisite class');
                    break;
                case 'Units Overload':
                    Flash::error('Units Overload');
                    break;
                case 'Conflict':
                    Flash::error('Conflict in adding class, drop class first');
                    break;
                case 'Class Taken':
                        Flash::error('Class has already been passed');
                        break;
                default:
                    
                    break;
            }  
        }

        //success message from  route studentClassDelete 
        if($request->has('fromStudClassDelete')){
            Flash::success('Class dropped succesfully');
        }

        return view('menu_Super/addCourses/classOfferings', [
            'student' =>  $student,
            'classes' => $classes,
            'course' => $course,
            'certOptions' => $certOptions
        ]);
    }

     

    /**
     * Checker if pre req subj is passed
     * 
     */

     public function preReqTaken($stud_id, $subj){
       
       //all classes student has already taken
        $s = StudentClass::
        where('student_id',$stud_id)
        ->with('ClassGrade', 'ClassOffering')
        ->whereHas('ClassGrade', function ($query){
            $query->where('isPass', 1);
        })
        ->get();

    

        $e = EnrollProgramme::
            where('student_id', $stud_id)
            ->where('status', '0')
            ->whereHas('CourseProgramme.CourseProgrammePrereq', function ($query) use($subj){
                $query->where('CourseProgramme.subjCode', '=', $subj);
            })
            ->get();
            

       if($e->isEmpty()){
           //class has no pre reqs
            return true;
       }
       if(!($e->isEmpty()) && $s->isEmpty()){
            //subj has pre req AND student has no record of any classes
            return false; //false means student cannot add the classoffering
        }
        


       //get the courseProg ID where the added subj is related
        $e = EnrollProgramme::where('student_id', $stud_id)
            ->where('status', '0')
            ->with('CourseProgramme', function ($query) use($subj){
                $query->where('subjCode', '=', $subj);
            })->get();
        
        
       $prereq = CourseProgrammePreReq::
        where('course_programme_id',$e[0]->CourseProgramme[0]->id)
        ->with('CourseProgramme')->get();
           
            
        $preReqs= [];
       //loop prereq subjs
       foreach ($prereq as $prereq) {
        $preReqs[] = $prereq->PrereqProg->subjCode;
           foreach($s as $takenClass){
                //echo($takenClass->ClassOffering->subjCode);
                if(in_array($takenClass->ClassOffering->subjCode,$preReqs)){
                    return true;
                }
           }

           return false;
       }
 
     }

     public function classTaken($stud_id, $subj){
        
        //class with subjcode and is Pass
        $s = StudentClass::
        where('student_id',$stud_id)
        ->whereHas('ClassOffering', function ($query) use($subj){
            $query->where('subjCode', $subj);
        })
        ->whereHas('ClassGrade', function ($query){
            $query->where('isPass', 1);
        })
        ->get();
        
        if($s->isEmpty()){
            //subjCode is not yet taken or passed
            return false;
        };

        return true;
     }

     public function conflictSched($sched1, $sched2){
        // $a = explode('', $sched1);
        // $b = explode(' ', $sched2);

            //time1 result is array 
            // ex. 7:40-9:10 time1[0] = [7,40,9,10]
            // time1[0][0] = 7

        preg_match_all('!\d+!', $sched1, $time1); 
        preg_match_all('!\d+!', $sched2, $time2);
        if($sched1[0] == $sched2[0]){ // tth mw 
            if(
                $time1[0][0] == $time2[0][0] &&
                $time1[0][1] == $time2[0][1]
                ){ 
                return true;
            }
        }

        
        return false;
     }

    /**
     * Add A Class in StudentClass
     * Add class to student
     */

    public function studentClassStore(Request $request){
        
        
        $studentID = $request->student_id;
        $student = Student::find($studentID);
        
        

        // get all specific student's classses for this acad time
        $s = ClassOffering::with(['StudentClass' =>
                function ($query) use($studentID){
                $query->where('student_id', '=',$studentID);
                }])
                ->whereHas('StudentClass', function ($query) use($studentID){
                    $query->where('student_id', '=',$studentID);
                    })
                ->where('year', $request->year)
                ->where('semester', $request->sem)       
                ->get();
        
        //classOffering: the recently added class
        $added = ClassOffering::where('id',$request->classOffering_id);
            $a_subj = $added->value('subjCode');
            $a_class = $added->value('classCode');
            $a_sched = $added->value('schedule');
            
             $c = $added->with('Course')->get();
             $a_units = $c[0]->Course->units;


            //if units full
            if((($student->unitsTook) + $a_units ) > $student->units ){
                $error = 'Units Overload';
                return redirect()->route('goTo_classOfferings', [
                    'id' => $studentID,
                    'error' => $error
                ])->withInput();
            }

            //checker if added class is already passed by student
            $checkerClass = $this->classTaken($request->student_id, $a_subj);
            if($checkerClass){
                $error = "Class Taken";
                return redirect()->route('goTo_classOfferings', [
                    'id' => $studentID,
                    'error' => $error
                ])->withInput();
            }

             //check if may pre req yun na added class, if so na take na ba ng student ? can be added : error
            $checkerPrereq = $this->preReqTaken($request->student_id, $a_subj);
            
            if(!$checkerPrereq){
                $error = "Prereq";
                return redirect()->route('goTo_classOfferings', [
                    'id' => $studentID,
                    'error' => $error
                ])->withInput();
            }
               
        //check if with conflict

        
        foreach($s as $s){
            
            if ($s->subjCode == $a_subj ||
                $s->classCode == $a_class ||
                $s->schedule == $a_sched ||
                $this->conflictSched($s->schedule, $a_sched)
                )
            {
            
                $error = 'Conflict';
                return redirect()->route('goTo_classOfferings', [
                    'id' => $request->student_id,
                    'error' => $error
                ])->withInput();
            }
 
        }
        
    
        $cg = new ClassGrade();
        $cg->save();
        StudentClass::create([
            'student_id' => $request->student_id,
            'classOffering_id'  => $request->classOffering_id,
            'classGrade_id' =>$cg->id,

        ]);
        

        
        //update the units took
        $student->unitsTook += $a_units;
        $student->save();

        //get person id
        $personID = $student->person_id;


        Flash::success('Student Added Class Successfully.');
        return redirect()
        ->route('goTo_prereg', [
            'id' => $personID,
            'acadSem' => $request->sem,
            'acadYear' => $request->year
            ])
        ->withInput();
    }


    public function studentClassDelete(Request $request){
        
        $cg_id = StudentClass::where('student_id', $request->student_id )
                ->where('classOffering_id',$request->classOffering_id )
                ->value('classGrade_id');
        $sc = StudentClass::where('student_id', $request->student_id )
                ->where('classOffering_id',$request->classOffering_id )->delete();
        ClassGrade::find($cg_id)->delete();
        
        //update unitsTook
        $c = ClassOffering::where('id',$request->classOffering_id)
            ->with('Course')->get();
        $units = $c[0]->Course->units;
        $s = Student::find($request->student_id);
        if($s->unitsTook != 0){
            $s->unitsTook -= $units;
            $s->save();
        }
        
        


        // Drop button is found in prereg view and classOfferingShow
        //it will return back to which place they pressed
        // the drop button

        //will go to prereg view after
        if($request->has('backToPreregView')){
            return redirect()->route('goTo_prereg', [
                'id' => $request->id,
                'acadYear' =>$request->year,
                'acadSem' =>$request->sem,
                'fromStudClassDelete' => true
            ])->withInput();
        }

        //will go back classOfferingShow (class offerring list)
        return redirect()->route('goTo_classOfferings', [
            'id' => $request->student_id,
            'fromStudClassDelete' => true
        ])->withInput();

    }


    //Show all class offerings based on year and sem
    public function classOfferingsShow(Request $request){
        $c = ClassOffering::all();
        return view('menu_Super.classes.classOfferings',[
            'classes' => $c
        ]);
    }
}
