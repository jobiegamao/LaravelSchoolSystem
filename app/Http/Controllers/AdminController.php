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
        $students = Student::orderBy('updated_at','asc')->get();

        return view('menu_Super/enrollment/index')
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
    public function studentEnroll(Request $request, $id)
    {
        $student = Student::where('id',$id);
       // dd($request['isEnrolled']);
        $student->update(request(['isEnrolled']));

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
        ->select('CourseProgramme.course_id', 'Course.subjname', 'Course.subjcode',)
        ->where('Person.id','=',  $request->id)
        ->distinct()
        ->get();


        return view('menu_Super/addCourses/courseProgramme',
            compact('person', 'course')
        );
    }


}
