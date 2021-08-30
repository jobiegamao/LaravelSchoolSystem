<?php

namespace App\Http\Controllers;
use Flash;
use Illuminate\Http\Request;
use App\Models\Person; 
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentUpdate;
use App\Models\Fees; 
use App\Models\ClassOffering;
use App\Models\Payments; 
use App\Models\AcadPeriod;

class FinanceController extends Controller
{
    public function index(){
        $students = Student::all();

        return view('menu_Finance.index', [
            'students' => $students
        ]);
    }

    public function goTo_payment($id){
        $person = Person::find($id);
        return view('menu_Finance.student.payment', ['person' => $person]);
    }

    public function paymentStore(Request $request){
        
        Payments::create($request->all());
        Flash::success('Payment saved successfully.');
        return redirect()->route('finance.index');
    }

    public function paymentShow($id){
        $person = Person::find($id);
        
        return view('menu_Finance.student.history' ,[
             'person' => $person
        ]);
    }
 
    public function balance(Request $request, $id){
        $student = Student::where('person_id', $id)
                    ->with('StudentUpdateLatest','Person.Payments')
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
                    'isGrad' => 0,
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


        ##lab fees
        $totalLabFee = 0;
            //get courses of student on the specified year and sem
        $c = Course::
            whereHas('ClassOffering', function ($query) use($acadPeriod){
                $query->where('year', $acadPeriod->acadYear)
                      ->where('semester', $acadPeriod->acadSem);
            })
            ->whereHas('ClassOffering.StudentClass', function ($query) use($student){
                $query->where('student_id', $student->id);
            })
            ->get();

        foreach($c as $c){
            $totalLabFee += $c->labFee;
        }
         
        $totalTuition = 0;
        if($latest){
            $isGrad = $student->StudentUpdateLatest->isGrad;
            $unitsFee = $student->StudentUpdateLatest->unitsTook *  $fees->unitsFee;
            $adj = $student->StudentUpdateLatest->adjustments;
            $currDue = $student->StudentUpdateLatest->currDue;

            //in case if wala pa na update sa table
            if($unitsFee > 0 && $currDue == 0){
                $s = $student->StudentUpdateLatest; 
                $s->currDue =  $unitsFee + $fees->totalMisc();
                $s->save();
                $currDue = $student->StudentUpdateLatest->currDue;
            }
            
            
        }else {
            $isGrad = $student->StudentUpdate[0]->isGrad;
            $unitsFee = $student->StudentUpdate[0]->unitsTook *  $fees->unitsFee; 
            $adj = $student->StudentUpdate[0]->adjustments;
            $currDue = $student->StudentUpdate[0]->currDue;
            
            //in case if wala pa na update sa table
            if($unitsFee > 0 && $currDue == 0){
                $s = $student->StudentUpdate[0]; 
                $s->currDue =  $unitsFee + $fees->totalMisc();
                $s->save();
                $currDue = $student->StudentUpdate[0]->currDue;
            }
        }
       

        $totalTuition += $unitsFee + $fees->totalMisc() + $totalLabFee;
        if($isGrad){
            $totalTuition += $fees->totalGradFee();
        }
        $balance = $totalTuition - $totalPay - $adj;
        if($currDue == 0){
            $balance = 0;
        }
   
        return view('menu_Student.balance.balance', [
            'fees' => $fees,
            'student' => $student,
            'balance' => $balance,
            'totalPay'=> $totalPay,
            'totalLabFee'=> $totalLabFee,
            'unitsFee'=> $unitsFee,
            'totalTuition'=> $totalTuition,
            
            'adj' =>$adj,
            'isGrad' => $isGrad,
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

    public function updateEnrollTag(Request $request,$id ){
         $student = Student::find($id);
         $ap = AcadPeriod::latest()->first();

         if($request->isEnrolled == 0){
            $student->update(['isEnrolled' => 0]);
            Flash::success('Student Updated Successfully.');
            return back();
         }
        
         if($student->Person->PaymentLatest == null){
            Flash::error('Balance Account is Not Yet Settled');
            return back();
         }
         $due = $student->StudentUpdateLatest->currDue;
         if($student->Person->PaymentLatest->acadPeriod_id == $ap->id &&
            $student->Person->PaymentLatest->amount >= ($due * .10)
         ){
             $student->update(['isEnrolled' => $request->isEnrolled]);

         }else{
             Flash::error('Balance Account is Not Yet Settled');
             
         }
         return back();
    }

    public function coursefees(){
        
        $c = Course::all();
        return view('menu_Finance.coursefees', [
            'course' => $c
        ]);
    }
    public function coursefeesUpdate(Request $request){
        
        Course::where('subjCode',$request->subjCode)
        ->update(['labFee' => $request->labFee]);
        Flash::success('Course Fee Updated Successfully.');
        return back();
    }

    public function paymentsAll(){
        $payments = Payments::all();
        
        return view('menu_Finance.payments_all' ,[
             'payments' => $payments
        ]);
    }

}
