<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Validator, Input, Redirect;

// add models that will be used in this controller
use App\Models\Person; 
use App\Models\Student; 
use App\Models\EnrollProgramme; 

use Illuminate\Support\Facades\DB;


// Functions to be used by Admin/Registrar View

class AdminController extends Controller
{


    public function goTo_enrollmentList(Request $request)
    {
        $students = Student::where('isEnrolled','0')->get();

        return view('menu_Super/enrollment/new/index')
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

        return view('menu_Super/enrollment/new/show')
            ->with('student', $students);
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
        return view('menu_Super/enrollment/new/enrollProgramme/enrollProgramme')
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
        return redirect('/students/enrolling-list');;
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


    public function courseProgrammeShow(Request $request)
    {
        $person = Person::find($request->id);
        if (empty($person)) {
            Flash::error('ID not found');

            return redirect(route('goTo_courseProgramme'));
        }

        // need to join pre req subjects pa
        // curriculum? 
        // class grade
        $course = DB::table('CourseProgramme')	 
        ->join('EnrollProgramme', 'EnrollProgramme.programme_id', '=', 'CourseProgramme.programme_id')
        ->join('Course', 'CourseProgramme.course_id', '=', 'Course.id')
        ->join('Student', 'Student.id','=','EnrollProgramme.student_id')
        ->join('Person','Person.id','=','Student.person_id')
        ->select('CourseProgramme.course_id', 'Course.subjname','CourseProgramme.isProfessional', 'Course.subjcode',)
        ->where('Person.id','=',  $request->id)
        ->distinct()
        ->get();


        return view('menu_Super/addCourses/courseProgramme',
            compact('person', 'course')
        );
    }


}
