<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash, Auth;
//models
use App\Models\Teacher;
use App\Models\ClassOffering; 
use App\Models\StudentClass; 
use App\Models\ClassGrade; 
use App\Models\AcadPeriod; 
use App\Models\GradeReports; 

class TeacherController extends Controller
{
    public function index(){
        $t = Teacher::all();

        return view('menu_Registrar.teachers.index', [
            't' => $t
        ]);
    }

    public function classes($id){
        //gatekeep other teachers from viewing other teachers's record
        if(Auth::user()->role == "Teacher" && Auth::user()->Person->Teacher->id !=$id){
            abort(403); 
        }
        //


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

    public function allclasses($id){
        //gatekeep other teachers from viewing other teachers's record
        if(Auth::user()->role == "Teacher" && Auth::user()->Person->Teacher->id !=$id){
            abort(403); 
        }
        //

        $acadPeriod = AcadPeriod::latest()->first();
        $classes = ClassOffering::where('teacher_id', $id)
                    ->with('Teacher')
                    ->get();
   
        return view('menu_Teacher.teachers.classes.classOfferings', [
            'classes' => $classes,
            'allclasses' => 1
        ]);
    }

    public function classStudents(Request $request){
        //gatekeep other teachers from viewing other teachers's record
        if(Auth::user()->role == "Teacher" && Auth::user()->Person->Teacher->id !=$request->tid){
            abort(403); 
        }
        //
        
        $class = ClassOffering::find($request->id);
        $report = GradeReports::where('classOffering_id', $class->id)->first();
        if( $report == null){
            $reported = 0;
        }else{
            $reported = 1;
        }

        $s = StudentClass::where('classOffering_id', $request->id)
                    ->with('ClassGrade', 'ClassOffering')
                    ->get();
        

        return view('menu_Teacher.teachers.students.studentClass', [
            's' => $s,
            'class' => $class,
            'reported' => $reported
        ]);
    }

    public function classGradeUpdate(Request $request, $id){

        $c = ClassGrade::whereId($id);
        $c->update(request()->except(['_token','_method']),$id);
        Flash::success('Student Grade Updated Successfully.');
        return redirect()->back();
    }

    public function gradeReport(Request $request){

        //checker if report is valid
        $sc = StudentClass::
            where('classOffering_id', $request->classOffering_id)
            ->with('ClassGrade')
            ->get();
        if($sc->isEmpty()){
            Flash::error('INVALID REPORT.');
            return redirect()->back();
        }
        foreach($sc as $a){
            if($a->ClassGrade->prelimGrade == null ||
               $a->ClassGrade->midtermGrade == null ||
               $a->ClassGrade->prefinalsGrade == null ||
               $a->ClassGrade->finalsGrade == null ){
                    Flash::error('NOT ALL GRADES ARE FILLED.');
                    return redirect()->back();
            }
        }
        // EOF CHECKER

        //CHANGE ISPASS in ClassGrade
        foreach($sc as $b){
            if($b->ClassGrade->finalsGrade >= 75){
                $b->ClassGrade->isPass = 1;
                $b->ClassGrade->save();
            }else{
                $b->ClassGrade->isPass = 0;
                $b->ClassGrade->save();
            }
        }
        //EOF isPass Change
      

        GradeReports::create($request->all());
        Flash::success('Grades Published Successfully.');
        return redirect()->back();
    }
}
