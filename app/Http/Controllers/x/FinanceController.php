<?php

namespace App\Http\Controllers;
use App\Models\RegisterAdmission;
use App\Models\EnrolPayLog;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function registeredAdmissionList()
    {
        $admissions = RegisterAdmission::doesntHave('enrollment')->get();
       
        return view('Finance.register_admission', [
            'person' => $admissions
        ]);
    }

    public function enrollPayLog($id){

        return view('Finance.pay_enroll_fee')->with($id);
    }

}
