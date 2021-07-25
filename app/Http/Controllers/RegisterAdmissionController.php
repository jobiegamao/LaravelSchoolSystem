<?php

namespace App\Http\Controllers;

use App\Models\RegisterAdmission; ///insert model
use App\Models\Admission;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //use DB::
use Flash;
use Response;



class RegisterAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$admissions = RegisterAdmission::orderBy('created_at', 'asc')->get();
        $admissions = RegisterAdmission::doesntHave('enrollment')->get();
       
        return view('register_admission.index', [
            'person' => $admissions
        ]);
    }

   
    public function create()
    {

        //return view('register_admission.create');
    }

    public function createStudent($id)
    {

        Flash::success('Register Admission saved successfully.');

        //return redirect(route('register.index'));
        
    }


    public function store(Request $request)
    {
        $input = $request->all();

        
        $registerAdmission = RegisterAdmission::create($input);

        Flash::success('Register Admission saved successfully.');

        return redirect(route('register.index'));
    }

    //show details of specific ID
    public function show($id)
    {
        $person = RegisterAdmission::find($id);

        if (empty($person)) {
            Flash::error('Student not found');
            return redirect()->back();
        }

        return view('register_admission.show')->with('registerAdmission', $person);
    }

    
    public function edit($id)
    {
        $person = RegisterAdmission::find($id);
        if (empty($person)) {
            Flash::error('Student not found');
            return redirect()->back();
        }

        return view('register_admission.edit')->with('registerAdmission', $person);
    }

    
    public function update(Request $request, $id)
    {
        $registerAdmission = RegisterAdmission::where('id',$id);

        $request->validate([
            'course_2'=> 'nullable|different:course_1',
        ]);
        

        $registerAdmission->update([
            'course_1' => $request['course_1'],
            'course_2' => $request['course_2'],
            'acad_year'=> $request['acad_year'],
            'acad_sem'=> $request['acad_sem'],
            'registration_status' => $request['registration_status'],
            'financeApproval_status' => $request['financeApproval_status'],
        ]);

        
        //update in admissions
        // admission id
        $admission_id = $registerAdmission->pluck('admission_id');
        $admission = Admission::where('id',$admission_id)->first();
        
        $admission->update([
            'name' => $request['name'],
            'school' => $request['school'],
            'entrance_exam_grade'=> $request['entrance_exam_grade'],
            'course_choice'=> $request['course_choice'],
        ]);
        

        Flash::success('Admission updated successfully.');

        return redirect(route('register.index'));

       
    }

    
    public function destroy($id)
    {
        $student = RegisterAdmission::find($id);
        $student->delete();
        
        Flash::success('Student has deregistered successfully.');

        return back();
    }
}
