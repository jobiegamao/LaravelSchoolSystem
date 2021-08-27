<?php

namespace App\Http\Controllers;
use Flash;
use Illuminate\Http\Request;
use App\Models\Person; 
use App\Models\Student; 
use App\Models\EnrollProgramme; 
use App\Models\CourseProgramme; 
use App\Models\CourseProgrammePreReq; 
use App\Models\ClassOffering; 
use App\Models\ClassGrade; 
use App\Models\StudentClass; 
use App\Models\AcadPeriod; 
use App\Models\Fees; 
use App\Models\Payments; 
use App\Models\StudentUpdate; 

class StudentController extends Controller
{
    public function grades(Request $request, $id){
       
            //pressed prev or next button
        if($request->has('changePeriod')){
            
            $acadPeriod = AcadPeriod::find($request->acadPeriod_id);
            
            $student = Student::whereId($id)
                ->with(['StudentUpdate' => function ($query) use($acadPeriod){
                        $query->where('acadPeriod_id',$acadPeriod->id);
                    }])
                ->first();
                
            $classes = StudentClass::where('student_id',$id )
                ->with('ClassGrade', 'ClassOffering')
                ->whereHas('ClassOffering', function ($query) use($acadPeriod){
                    $query->where('year', $acadPeriod->acadYear)
                          ->where('semester', $acadPeriod->acadSem);
                })
                ->get();

            // if(!empty($classes)){
            //     //calculate qpi
            //     $this->calculateQPI($classes);
            // }
               

            
            return view('menu_Student.grades.grades', [
                'student' => $student,
                'classes' => $classes,
                'acadPeriod' => $acadPeriod,
            ]);

        }
        
            //pressed grades at student list view
        $latestClass = ClassOffering::
                    with(['StudentClass' =>
                        function ($query) use($id){
                            $query->where('student_id', $id);
                        }])
                    ->whereHas('StudentClass', function ($query) use($id){
                        $query->where('student_id', $id);
                        })
                    ->orderBy('year', 'desc')->orderBy('semester', 'desc')
                    ->first();
                    
        if($latestClass == null){
            Flash::error('New Student, No Recorded Grades');       
            return redirect()->back();
        }

        $year = $latestClass->year;
        $sem = $latestClass->semester;

        $acadPeriod= AcadPeriod::where('acadYear', $year)
                    ->where('acadSem', $sem)
                    ->first();
        

        $student = Student::whereId($id)
                ->with(['StudentUpdate' => function ($query) use($acadPeriod){
                        $query->where('acadPeriod_id',$acadPeriod->id);
                    }])
                ->first();
                

        // GET LAST SEM AND YEAR CLASS AND GRADES
        $classes = StudentClass::where('student_id',$id )
                ->with('ClassGrade', 'ClassOffering')
                ->whereHas('ClassOffering', function ($query) use($year, $sem){
                    $query->where('year', $year)->where('semester', $sem);
                })
                ->get();

       // session()->flashInput($request->input());
        return view('menu_Student.grades.grades', [
            'student' => $student,
            'classes' => $classes,
            'acadPeriod' => $acadPeriod,
        ]);
        
        
    }

    public function balance(Request $request, $id){
       //
    }

    public function calculateQPI($classes){
        //
    }

}
