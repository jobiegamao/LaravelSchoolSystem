<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Validator, Input, Redirect;
use Illuminate\Validation\Rule;

// add models that will be used in this controller
use App\Models\Person; 
use App\Models\Student; 
use App\Models\EnrollProgramme; 
use App\Models\CourseProgramme; 
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
        $this->studentUpdateUnits();
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
        $student->update(request()->except(['_token','_method']),$id);
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
     * units will  be based on course description for every minor + 12 , cert +4
     * major will be based on curriculum
     */
    public function studentUpdateUnits()
    {
       

       //-- current academic period --// 
       $acadSem = AcadPeriod::latest()->value('acadSem');

       // get all students who is passed and has curriculum. 
       $student= Student::with('CourseProgramme')->where('isPass', '1')->get();
       foreach($student as $s){
           $unitsCounter = 0;
            foreach($s->EnrolledProgramme as $ep){
                //echo($ep);
                if($ep->status == 0){
                    switch($ep->description){
                        case 'Certificate':
                            $unitsCounter+= 4;
                            break;
                        case 'Minor':
                            $unitsCounter+= 12;
                            break;
                        default:
                            foreach($s->CourseProgramme as $cp){
                                if($cp->yearLevel == $s->year && $cp->semester == $acadSem){
                                    $unitsCounter+= $cp->Course->units;
                                    
                                }
                                
                            }
                        
                    }
                    //echo();
                }
                
                
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
        $student = Student::where('isPass','1')->update(['isPass' => '0']);
 
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
       

        Flash::success('Programme Enrolled successfully.');
        return redirect('/students/enrolling-list');
    }

    /**
     * Delete table from enrollProgramme
     */

    public function enrollProgrammeDelete($id){
        $q = EnrollProgramme::find($id);
        $q->delete($id);

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

        if (empty($person)) {
            Flash::error('ID not found');

            return redirect(route('goTo_courseProgramme'))->withInput();
        }

        //Get Curriculum                                                                                 
        $enrolledProg = Student::find($studentID)->EnrolledProgramme
                                                 ->where('status', '0');
                                                 //get only curriculum of ongoing program

        $i=0; // major and minor counter
        $j=0; // cert counter
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
                    $b = $enrolledProg->CourseProgramme->where('isProfessional', '1')->where('yearImplemented', $year);
                    break;
            }

            if($enrolledProg->description != 'Certificate'){

                if($i > 0){
                    $course = $course->merge($a);
                }else{
                    $course = $a;
                }
                $i++;
            }else{
                if($j > 0){
                    $certOptions = $certOptions->merge($b);
                }else{
                    $certOptions = $b;
                }
                $j++;
            }
            
            
            
        }  

        if(!empty($course)){
            $course = $course->unique('subjCode'); //list of subjects to take. Curriculum ProgrammeCourses
        }else{
            $course = ([]);
        }
        
        if(!empty($certOptions)){                             //will not include in curriculum but will be displayed
            $certOptions = $certOptions->unique('subjCode'); // list of subjects as options to a cert programme
        }else{
            $certOptions = ([]);
        }                                                   
         
        
         

        return redirect()->back()
        ->with(compact('person', 'course', 'certOptions'))
        ->withInput();
    

    }

    public function goTo_prereg(Request $request){
        $acadYear = AcadPeriod::latest()->value('acadYear');
        $acadSem = AcadPeriod::latest()->value('acadSem');
        
        //if opened without values. like opening it thru the menu
        if(empty($request->all())){
            return view('menu_Super/addCourses/prereg')
            ->with(compact('acadYear'));
        }
          
        $person = Person::find($request->id);
        $studentID = Student::where('person_id', $request->id)->value('id');
        $student = Student::find($studentID);

        if (empty($person) || empty($student)) {
            Flash::error('ID not found');

            return redirect(route('goTo_prereg'))->withInput();
        }
        

        
        //Get and show Classes Registered for sem and year
            $prereg = StudentClass::where('student_id', $studentID)
            ->where('year', $request->acadYear ?? $acadYear)
            ->where('semester', $request->acadSem ?? $acadSem)
            ->get();





        if($request->has('fromStudClassDelete')){
                Flash::success('Class has been dropped');
        }
        
        return view('menu_Super/addCourses/prereg')
        ->with(compact('person', 'student','acadYear', 'acadSem', 'prereg'));
        
    }


    public function goTo_classOfferings(Request $request){
        $student = Student::find($request->id);
        
        return view('menu_Super/addCourses/classOfferings', [
        'student' =>  $student]);
    }

     /**
     * Show Offerings Based on Search
     * 
     */
    public function classOfferingsShow(Request $request){
        $student = Student::find($request->id);
        $acadYear = AcadPeriod::latest()->value('acadYear');
        $acadSem = AcadPeriod::latest()->value('acadSem');

                    //!!!!! if subjCode is not in student Curriculum, dont show
                    // checker here -----
                
                    //get all subjcode from CourseProgramme by student !!!
        

        $classes = ClassOffering::
            where('subjCode', $request->subjCode)
            ->where('year',$acadYear )
            ->where('semester', $acadSem )
            ->get();

        //error message is from studentClassStore. that method returns to this
        //route, and brings request->error when
        //  added class is error
        if($request->has('error')){
            Flash::error('Error in adding class, drop class first');
        }

        //success message from  route studentClassDelete 
        if($request->has('fromStudClassDelete')){
            Flash::success('Class dropped succesfully');
        }

        return redirect()->back()
        ->with(compact('student', 'classes'))
        ->withInput();
    }

    /**
     * Add A Class in StudentClass
     * Add class to student
     */

    public function studentClassStore(Request $request){
        
        $s = StudentClass::with('ClassOffering')
                    ->with('Student')->where('student_id',$request->student_id)
                    ->where('year', $request->year)
                    ->where('semester', $request->sem)
                    ->get();
        
        //classOffering: the added class
        $added = ClassOffering::where('id',$request->classOffering_id);
            $a_subj = $added->value('subjCode');
            $a_class = $added->value('classCode');
            $a_sched = $added->value('schedule');
            
             $c = $added->with('Course')->get();
             $a_units = $c[0]->Course->units;
            

        foreach($s as $s){
            //echo($s->ClassOffering);
            if  (
                $s->ClassOffering->subjCode == $a_subj ||
                $s->ClassOffering->classCode == $a_class ||
                $s->ClassOffering->schedule == $a_sched
                )
            {
                //dd('error');
                
                $error = true;
                return redirect()->route('classOfferings.show', [
                    'id' => $request->student_id,
                    'subjCode' => $a_subj,
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
            'semester' => $request->sem,
            'year' => $request->year,

        ]);
        

        $student = Student::find($request->student_id);
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
         StudentClass::where('student_id', $request->student_id )
        ->where('classOffering_id',$request->classOffering_id )
        ->delete();

        //update unitsTook
        $c = ClassOffering::where('id',$request->classOffering_id)
        ->with('Course')->get();
        $units = $c[0]->Course->units;
        $s = Student::find($request->student_id);
        $s->unitsTook -= $units;
        $s->save();


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
        return redirect()->route('classOfferings.show', [
            'id' => $request->student_id,
            'subjCode' => $request->subjCode,
            'fromStudClassDelete' => true
        ])->withInput();

    }
}
