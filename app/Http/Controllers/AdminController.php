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
     * Tag As Enrolled
     * isEnrolled
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


    public function chanfeecourseProgrammeShow(Request $request)
    {
        $person = Person::find($request->id);
        $studentID = Student::where('person_id', $request->id)->value('id');
        $curryear = $request->year;
        $currsem = $request->semester;

            //echo($person);
        if (empty($person)) {
            Flash::error('ID not found');

            return redirect(route('goTo_courseProgramme'))->withInput();
        }

        //add class in pre reg list
        if($request->addInPreReg != null){
            $cg = new ClassGrade();
            $cg->save();
            StudentClass::create([
                'student_id' => $request->student_id,
                'classOffering_id'  => $request->classOffering_id,
                'classGrade_id' =>$cg->id

            ]);
        }

        //Get and show Classes Registered for sem and year
            $prereg = StudentClass::where('student_id', $studentID)
                        ->where('year', $request->year)
                        ->where('semester', $request->semester)
                        ->get();

        //Get Curriculum                                                                                 
            $enrolledProg = Student::find($studentID)->EnrolledProgramme;

            $i=0;
            
            foreach ($enrolledProg as $enrolledProg){
                $year = CourseProgramme::where('progCode', $enrolledProg->progCode,)->max('yearImplemented');
                
                
                switch($enrolledProg->description){
                    case 'Major':
                        
                        $a = $enrolledProg->CourseProgramme->where('yearImplemented', $year);
                        break;
                    
                    default: 
                        $a = $enrolledProg->CourseProgramme->where('isProfessional', '1')->where('yearImplemented', $year);
                        break;
                }

                if($i > 0){
                    $course = $course->merge($a);
                }else{
                    $course = $a;
                }
                $i++;
                
            }  
            
            $course = $course->unique('subjCode');

        
        

            
        

        // output classOfferings based on search
        if($request->subjCode != null){

            $classes = ClassOffering::
            where('subjCode', $request->subjCode)
            ->where('year',$request->year )
            ->where('semester', $request->semester )
            ->get();

            return redirect()->back()->with(compact('person', 'course', 'prereg','classes', 'currsem', 'curryear'))->withInput();
        }

        //insert in studentClass on add button in classOffering
        // if($request->classOffering_id != null){

        //     $rules = [
        //         'classOffering_id' => [ Rule::unique('StudentClass,classOffering_id')->where(function ($query) {
        //             return $query->where('student_id', '!=', $request->student_id);
        //         })]
        //     ];
        
        //     $validator = Validator::make($request->classOffering_id, $rules);
        //     // special validation for your complex unique rule
        //     $validator->after(function ($validator) {
        //         // create a query to see if this record already exists.
        //         $exists = DB::table('StudentClass')
        //                 -> where('student_id', '=', $request->student_id)
        //                 ->join('ClassOffering','ClassOffering.id', '=', 'StudentClass.classOffering_id')
        //                 ->where('ClassOffering.schedule','=', $request->schedule)
        //                 ->exists();

        //         if ($validator->fails() || $exists) {
        //             $validator->errors()->add('schedule', 'conflict in schedule');
        //             return redirect()->back()->with(compact('person', 'course'))->withInput();
        //         }

        //     }
        // }

        
            
       


        return redirect()->back()->with(compact('person', 'course', 'prereg','currsem', 'curryear'))->withInput();
    }

    
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
            ->where('year', $request->acadYear)
            ->where('semester', $request->acadSem)
            ->get();
        
        return view('menu_Super/addCourses/prereg')
        ->with(compact('person', 'student','acadYear', 'acadSem', 'prereg'))
        ;
        
    }


    public function goTo_classOfferings(Request $request){
        $student = Student::find($request->id);
        
        return view('menu_Super/addCourses/classOfferings')
        ->with('student', $student);
    }

    public function classOfferingsShow(Request $request){
        $student = Student::find($request->id);
        $acadYear = AcadPeriod::latest()->value('acadYear');
        $acadSem = AcadPeriod::latest()->value('acadSem');

        $classes = ClassOffering::
            where('subjCode', $request->subjCode)
            ->where('year',$acadYear )
            ->where('semester', $acadSem )
            ->get();

            //if subjCode is not in student Curriculum, dont show
            // checker here -----
        
      
        
        return redirect()->back()
        ->with(compact('student', 'classes'))
        ->withInput();
    }

    /**
     * Add A Class in StudentClass
     */

    public function studentClassStore(Request $request){
        
        //if classOffering_id has sched conflict
        // checker here -----
        // need to return back and not continue


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
        $person = $student->person_id;

        Flash::success('Student Added Class Successfully.');
        return redirect()
        ->route('goTo_prereg', [
            'id' => $person,
            'acadSem' => $request->sem,
            'acadYear' => $request->year
            ])
        ->withInput();
    }
}
