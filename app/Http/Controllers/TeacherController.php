<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
//models
use App\Models\Teacher;
use App\Models\ClassOffering; 
use App\Models\StudentClass; 
use App\Models\ClassGrade; 
use App\Models\AcadPeriod; 

class TeacherController extends Controller
{
    public function index(){
        $t = Teacher::all();

        return view('menu_Super.teachers.index', [
            't' => $t
        ]);
    }

    public function classes($id){
        $acadPeriod = AcadPeriod::latest()->first();
        
        $classes = ClassOffering::where('teacher_id', $id)
                    ->with('Teacher')
                    ->where('year', $acadPeriod->acadYear)
                    ->where('semester', $acadPeriod->acadSem)
                    ->get();
   
        return view('menu_Teacher.teachers.classes.classOfferings', [
            'classes' => $classes
        ]);
    }

    public function classStudents(Request $request){
        $class = ClassOffering::find($request->id);
        $s = StudentClass::where('classOffering_id', $request->id)
                    ->with('ClassGrade', 'ClassOffering')
                    ->get();
        

        return view('menu_Teacher.teachers.students.studentClass', [
            's' => $s,
            'class' => $class
        ]);
    }

    public function classGradeUpdate(Request $request, $id){

        $c = ClassGrade::where('id',$id);
        $c->update(request()->except(['_token','_method']),$id);
        Flash::success('Student Grade Updated Successfully.');
        return redirect()->back();
    }
}
