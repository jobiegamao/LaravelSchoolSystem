<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
//models
use App\Models\Teacher;
use App\Models\ClassOffering; 
use App\Models\StudentClass; 
use App\Models\ClassGrade; 


class TeacherController extends Controller
{
    public function index(){
        $t = Teacher::all();

        return view('menu_Super.teachers.index', [
            't' => $t
        ]);
    }

    public function classes($id){
        $classes = ClassOffering::where('teacher_id', $id)
                    ->with('Teacher')
                    ->orderBy('semester','asc')
                    ->orderBy('year','desc')
                    ->get();
   
        return view('menu_Super.teachers.classes.classOfferings', [
            'classes' => $classes
        ]);
    }

    public function classStudents($id){
        $class = ClassOffering::find($id);
        $s = StudentClass::where('classOffering_id', $id)
                    ->with('ClassGrade', 'ClassOffering')
                    ->get();
        

        return view('menu_Super.teachers.students.studentClass', [
            's' => $s,
            'class' => $class
        ]);
    }

    public function classGradeUpdate(Request $request, $id){

        $c = ClassGrade::where('id',$id);
        $c->update(request()->except(['_token','_method']),$id);
        Flash::success('Student Grade Updated Successfully.');
        return back();
    }
}
