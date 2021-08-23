<?php

namespace App\Http\Controllers;
use Flash;
use Illuminate\Http\Request;
use App\Models\Person; 
use App\Models\Student;
use App\Models\StudentUpdate;
use App\Models\Fees; 
use App\Models\ClassOffering;
use App\Models\Payments; 
use App\Models\AcadPeriod; 
class RegistrarController extends Controller
{
    public function index(){
        $students = Student::all();

        return view('menu_Registrar.index', [
            'students' => $students
        ]);
    }

    public function goTo_payment($id){
        $person = Person::find($id);
        return view('menu_Registrar.student.payment', ['person' => $person]);
    }

    public function paymentStore(Request $request){
        
        Payments::create($request->all());
        Flash::success('Payment saved successfully.');
        return redirect()->route('registrar.index');
    }

    public function paymentShow($id){
        $person = Person::find($id);
        
        return view('menu_Registrar.student.history' ,[
             'person' => $person
        ]);
    }
 
    public function balance(Request $request, $id){
        $student = Student::where('person_id', $id)
                    ->with('StudentUpdateLatest', 'Person.Payments')
                    ->first();
        $latest = true;
        
        $fees = Fees::latest()->first();

        if( $student->StudentUpdateLatest == null ){
            Flash::error('No Recorded Balance');       
            return redirect()->back();
        }
        $acadPeriod = AcadPeriod::find($student->StudentUpdateLatest->acadPeriod_id);
        
        if($request->has('acadPeriod_id')){
            $latest = false;
            $student = Student::where('person_id', $id)
                    ->with(['StudentUpdate' => function ($query) use($request){
                        $query->where('acadPeriod_id',$request->acadPeriod_id);
                        }, 'Person.Payments'])
                    ->first();
                    //dd($student->Person->Payments);
            $acadPeriod = AcadPeriod::find($request->acadPeriod_id);

            if(empty($student->StudentUpdate[0])){
                return view('menu_Student.balance.balance', [
                    'fees' => $fees,
                    'student' => $student,
                    'balance' => 0.0,
                    'totalPay'=> 0.0,
                    'unitsFee'=> 0.0,
                    'totalTuition'=> 0.0,
                    'currDue' =>0.0,
                    'adj' =>0.0,
                    'acadPeriod' => $acadPeriod,
                    ]
                );
            }
    
        }

        

        $totalPay = 0.00;
        foreach($student->Person->Payments as $pay){
            if($latest && $pay->acadPeriod == $student->StudentUpdateLatest->acadPeriod){
                $totalPay+= $pay->amount;
            }
            if(!$latest && $pay->acadPeriod == $student->StudentUpdate[0]->acadPeriod){
                $totalPay+= $pay->amount;
            }
        }

        $totalTuition = 0;
        if($latest){
            $unitsFee = $student->StudentUpdateLatest->unitsTook *  $fees->unitsFee;
            
            $adj = $student->StudentUpdateLatest->adjustments;
            $currDue = $student->StudentUpdateLatest->currDue;

            //in case if wala pa na update
            if($unitsFee > 0 && $currDue == 0){
                $s = $student->StudentUpdateLatest; 
                $s->currDue =  $unitsFee + $fees->totalMisc();
                $s->save();
            }
            $currDue = $student->StudentUpdateLatest->currDue;
            
        }else {
            $unitsFee = $student->StudentUpdate[0]->unitsTook *  $fees->unitsFee; 
            $adj = $student->StudentUpdate[0]->adjustments;
            $currDue = $student->StudentUpdate[0]->currDue;
            //in case if wala pa na update
            if($unitsFee > 0 && $currDue == 0){
                $s = $student->StudentUpdate[0]; 
                $s->currDue =  $unitsFee + $fees->totalMisc();
                $s->save();
            }
            $currDue = $student->StudentUpdate[0]->currDue;
            
           
        }
       

        $totalTuition += $unitsFee + $fees->totalMisc();
        $balance = $totalTuition - $totalPay - $adj;

   
        return view('menu_Student.balance.balance', [
            'fees' => $fees,
            'student' => $student,
            'balance' => $balance,
            'totalPay'=> $totalPay,
            'unitsFee'=> $unitsFee,
            'totalTuition'=> $totalTuition,
            'currDue' =>$currDue,
            'adj' =>$adj,
            'acadPeriod' => $acadPeriod,
            ]
        );
    }

    public function updateDues(){
        $acadPeriod = AcadPeriod::latest()->first();
        $fees = Fees::latest()->first();

        $s = StudentUpdate::where('acadPeriod_id', $acadPeriod->id)->get();

        foreach($s as $s){
            if($s->unitsTook > 0){
                $s->currDue = $s->unitsTook * $fees->unitsFee + $fees->totalMisc();
                $s->save();
            }
        }

    

        return back();
    }
}
