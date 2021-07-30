<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Validator, Input, Redirect;

// add models that will be used in this controller
use App\Models\Student; 
use App\Models\EnrollProgramme; 


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
}
