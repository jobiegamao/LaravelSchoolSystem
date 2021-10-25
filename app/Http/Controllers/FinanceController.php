<?php

namespace App\Http\Controllers;
use Flash;
use App\Http\Requests\CreateCoursefeesRequest;
use Illuminate\Http\Request;
use App\Models\Person; 
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentUpdate;
use App\Models\Fees; 
use App\Models\ClassOffering;
use App\Models\Payments; 
use App\Models\AcadPeriod;
use App\Models\CourseFee;
use Auth;

class FinanceController extends Controller
{
    public function index(){
        $students = Student::whereHas('StudentUpdateLatest')->get();

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
        //gatekeep other students from viewing other student's record
        if(Auth::user()->role == "Student" && Auth::user()->person_id !=$id){
            abort(403); 
        } 
        //
        //check if student has passed enrollments (old student)
        $student = Student::where('person_id', $id)
                    ->with('StudentUpdateLatest','Person.Payments')
                    ->first();
        

        if( $student->StudentUpdateLatest == null ){
            Flash::error('No Recorded Balance');       
            return redirect()->back();
        }
        
        $acadPeriod = AcadPeriod::find($request->acadPeriod_id);  
         
        $student = Student::where('person_id', $id)
                ->with(['StudentUpdate' => function ($query) use($request){
                    $query->where('acadPeriod_id',$request->acadPeriod_id);
                    }, 'Person.Payments'])
                ->first();
              
        if(empty($student->StudentUpdate[0])){
            if($request->has('next')){
                return redirect()->route('balance', [
                    'id' => $id,
                    'acadPeriod_id' => $request->acadPeriod_id+1,
                ]);
            }
            return redirect()->route('balance', [
                'id' => $id,
                'acadPeriod_id' => $request->acadPeriod_id-1,
            ]);
        }

        //All of student's Updates 
        $studrecord = Student::where('person_id', $id)->with('StudentUpdate')->first();
        //dd($studrecord->StudentUpdate[0]);
        
        $totalPay = 0.00;
        $totalPay_sem = 0.00;
        foreach($student->Person->Payments as $pay){
            if($pay->acadPeriod_id == $student->StudentUpdate[0]->acadPeriod_id){
                $totalPay_sem+= $pay->amount;
            }
            if($pay->acadPeriod_id < $acadPeriod->id){
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
            ->whereHas('CourseFee', function ($query) use($acadPeriod){
                $query->where('acadPeriod_id', $acadPeriod->id);
            })
            ->with(['CourseFee' => function ($query) use($acadPeriod){
                $query->where('acadPeriod_id',$acadPeriod->id);
             }])
            ->get();

        foreach($c as $c){
            $totalLabFee += $c->CourseFee[0]->labFee;
        }

        ##eof lab fees
         
        $totalTuition_sem = 0.0;

        $fees = Fees::where('acadPeriod_id',$acadPeriod->id)->first();
        $isGrad = $student->StudentUpdate[0]->isGrad;
        $unitsFee = $student->StudentUpdate[0]->unitsTook *  $fees->unitsFee; 
        $adj_sem = $student->StudentUpdate[0]->adjustments;
        $currDue_sem = $student->StudentUpdate[0]->currDue;
        
        //update sa database
        $s = $student->StudentUpdate[0];
        
        $bill =  $unitsFee + $fees->totalMisc() + $totalLabFee;
        if($isGrad){
            $bill += $fees->totalGradFee();
        }
        $s->currDue = $bill;
        $s->save();
        $currDue_sem = $student->StudentUpdate[0]->currDue;
        
        $totalTuition_sem = $currDue_sem;

        ##over balance
        $totalAdj = 0.0;
        $totalCurrDue = 0.0;
        $overbalance_sem = 0.0;
        foreach($studrecord->StudentUpdate as $sem){
            if($sem->acadPeriod_id < $acadPeriod->id){
                $totalAdj += $sem->adj;
                $totalCurrDue += $sem->currDue;
            }
        }
        $overbalance_sem = $totalPay - $totalCurrDue - $totalAdj;
        
        ##over balance
        
        $balance_sem = $totalTuition_sem - $totalPay_sem - $adj_sem - $overbalance_sem;
       
        if($unitsFee == 0 ){
            $balance_sem = 0.00;
            $currDue_sem = 0.00;
        }

        //save balance in table
        $s->balance = $balance_sem;
        $s->save();
   
        return view('menu_Student.balance.balance', [
            'fees' => $fees,
            'student' => $student,
            'balance' => number_format($balance_sem, 2),
            'totalPay'=> number_format($totalPay_sem, 2),
            'totalLabFee'=> $totalLabFee,
            'unitsFee'=> number_format($unitsFee, 2),
            'totalTuition'=> number_format($totalTuition_sem, 2),
            'currDue'=> number_format($currDue_sem, 2),
            'adj' =>$adj_sem,
            'overbalance'=> number_format($overbalance_sem, 2),
            'isGrad' => $isGrad,
            'acadPeriod' => $acadPeriod,
            ]
        );
    }

    public function updateDues(){
        $acadPeriod = AcadPeriod::latest()->first();
        $fees = Fees::where('acadPeriod_id',$acadPeriod->id)->first();
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
         $totalPay = 0.0;
         
         if($student->Person->PaymentLatest->acadPeriod_id == $ap->id){
            foreach($student->Person->Payments as $pay){
                if($pay->acadPeriod_id == $ap->id){
                    $totalPay += $pay->amount;
                }
            }
            if($totalPay >= ($due * .10)){
                $student->update(['isEnrolled' => $request->isEnrolled]);
            }else{
                Flash::error('Insufficient Payment For Enrollment. Requirement: 10% Downpayment');
            }
         }else{
             Flash::error('Balance Account is Not Yet Settled');
             
         }
         return back();
    }

    public function coursefees(){
        // go to courseFees view
        $ap = AcadPeriod::latest()->first();
        $cf = CourseFee::where("acadPeriod_id",$ap->id)->get();
  
                 
        return view('menu_Finance.coursefees.index', [
            'cf' => $cf
        ]);
    }

    public function coursefeesCreate(Request $request){
        return view('menu_Finance.coursefees.create');
    }
    public function coursefeesStore(CreateCoursefeesRequest $request){
        $input = $request->all();
       
        CourseFee::create($input);

        Flash::success('Programme Enrolled successfully.');
        return redirect(route('finance.coursefees'));
    }
    public function coursefeesUpdate(Request $request){
        
        $ap = AcadPeriod::latest()->first();
        $cf = CourseFee::where('acadPeriod_id',$ap->id)
                ->where('subjCode',$request->subjCode)
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
