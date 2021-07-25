<?php

namespace App\Http\Controllers;


// use App\Http\Requests\CreateAdmissionRequest;
// use App\Http\Requests\UpdateAdmissionRequest;
// use App\Repositories\AdmissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Admission; //insert model path
use App\Models\RegisterAdmission;
use Illuminate\Support\Facades\DB; //use DB::
use Flash;
use Response;

class AdmissionController extends AppBaseController
{
    
    /**
     * Display a listing of the admmissions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $admissions = Admission::orderBy('updated_at', 'asc')->get();
        
       
        return view('Admission.index', [
            'person' => $admissions
        ]);      
    }

    public function create()
    {
        return view('Admission.create');
    }

    public function store(Request $request){


        // $admission = Admission::create([  
        //     'name' => $request->input('name', 'default'),
        //     'school'=> $request->input('school', 'default'),
        //     'entrance_exam_grade' => $request->input('entrance_exam_grade'),
        //     'course_choice'=> $request->input('course_choice', 'default'),
        //     'accepted_status' => $request->input('accepted_status')
        // ]);  // since in label we already specified the name, we can use request->all

        // Admission::create($request->all());
        // or we can use validations here

        Admission::create(request()->validate(
            [ 
                'person_details_id' => 'required|
                    exists:App\Models\PersonDetails,id|
                    unique:App\Models\Admission,person_details_id,',
                'school' => ['string'],
                'entrance_exam_grade',
                'course_choice',
                'accepted_status',
            ]
        ));

        Flash::success('Admission saved successfully.');

        return redirect()->back();
    }

    public function show($id)
    {
        $admission = Admission::find($id);
        return view('Admission.show')->with('person', $admission);
    }

    public function edit($id)
    {
        $admission = Admission::find($id); //get id
        return view('Admission.edit')->with('person', $admission); // syntax:: (viewfoldername.filename)->with(newVarName, IDvar)
    }

    public function update(Request $request, $id)
    {
        

        $admission = Admission::where('id',$id);

        if (empty($admission)) {
            Flash::error('Person not found');

            return redirect(route('admission.index'));
        }

      

        $admission->update($request->except([ '_token' , '_method' ]), $id);

        Flash::success('Admission updated successfully.');

        return redirect(route('admission.index'));
    }

    public function destroy($id)
    {
        $admission = Admission::find($id); //look for
        
        
        $admission->delete($id);

        Flash::success('Student deleted successfully.');

        return redirect(route('admission.index'));
    }



        public static function getNextID(){

            $next_id = Admission::max('id');
            $next_id = $next_id + 1;

            
            return $next_id; 
            
        }

        public function acceptedList(){

            $admissions = Admission::doesntHave('enrolledStudent')->get();
            //dd($admissions);
            return view('Admission.acceptedList', [
                'person' => $admissions
            ]);  
        }

  

        public function createStudent($id)
        {
            //$getAdmission = Admission::with('getRegistration')->get()->find($id);
            //dd($getAdmission->attributesToArray());
            
            RegisterAdmission::create([
                'admission_id' => $id
            ]);
            
            Flash::success('Registration control number is created.');
            return redirect()->back();
            //return to acceptedList
        }


}
