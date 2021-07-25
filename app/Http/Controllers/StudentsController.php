<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Students;
use App\Models\Admission;
use App\Models\Student_Courses;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentsController extends AppBaseController
{
    /**
     * Display a listing of the Students.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Students $students */
        $students = Students::all();

        return view('students.index')
            ->with('students', $students);
    }

    /**
     * Show the form for creating a new Students.
     *
     * @return Response
     */
    public function create()
    {
        return view('students.create');
    }

    public function enrollID($id)
    {
       
       
  
        if (Students::where('register_admission_id',$id)->exists()) {
            //student is already enrolled
            Flash::error('Student is already enrolled');
            return back();
        }

        Students::create([
            'register_admission_id' => $id
        ]);

        $student_id = Students::where('register_admission_id', $id)->value('id');
    
        //enroll student to course/s
        $registration = \App\Models\RegisterAdmission::find($id);
        

        Student_Courses::create([
            'student_id' => $student_id,
            'course_id' => $registration->course_1,
            'acad_year'=> $registration->acad_year,
            'acad_sem'=> $registration->acad_sem,
        ]);

        if($registration->course_2 != null){
            Student_Courses::create([
                'student_id' => $student_id,
                'course_id' => $registration->course_2,
                'acad_year'=> $registration->acad_year,
                'acad_sem'=> $registration->acad_sem,
            ]);
        }

        

        Flash::success('Student Enrolled successfully.');
        return back();
    }

    /**
     * Store a newly created Students in storage.
     *
     * @param CreateStudentsRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentsRequest $request)
    {
        $input = $request->all();

        /** @var Students $students */
        $students = Students::create($input);

        Flash::success('Students saved successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Students.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Students $students */
        $students = Students::find($id);

        if (empty($students)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified Students.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Students $students */
        $students = Students::find($id);

        if (empty($students)) {
            Flash::error('Students not found');

            return redirect(route('students.index'));
        }

        return view('students.edit')->with('students', $students);
    }

    /**
     * Update the specified Students in storage.
     *
     * @param int $id
     * @param UpdateStudentsRequest $request
     * is already merged with Student_Courses Rules/Request
     * @return Response
     */
    public function update($id, UpdateStudentsRequest $request)
    {
       
         $input = $request->all();
        dd($input);
        
        $students = Students::find($id);
        

        if (empty($students)) {
            Flash::error('Student not found');

            return redirect()->back();
        }
       
       
      
        //Update student
        $students->fill($request->all());
        $students->save();
        

        // Update Course

         $studentCourse = Student_Courses::where('student_id', $id)->first();
        // if (empty($studentCourse))
        //Student_Courses::create($request->all());


        if (Student_Courses::where('student_id', $id)->doesntExist()) {
            //if empty? student has not yet declared course
            //so lets create in pivot table
            foreach($request->course_id as $course){

                $studentCourse->create([
                    'student_id' => $request->id,
                    'course_id'=> $course,
                    'acad_year'=> $request->acad_year,
                    'acad_sem' =>$request->acad_sem
                ]);
            }

        }else {
            // this is only update if input then was wrong
            // shifting of courses should not be done here

            foreach($request->course_id as $course){
                // get id return 
                // TO EDIT PA
                $studentCourse = Student_Courses::where('student_id', $id)->get();
                $studentCourse->update([
                    'student_id' => $request->id,
                    'course_id'=> $course,
                    'acad_year'=> $request->acad_year,
                    'acad_sem' =>$request->acad_sem
                ]);
            }
            

            

            
        }


        Flash::success('Student updated successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Students from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $student = Students::find($id); //look for
        
        
        $student->delete($id);

        Flash::success('Student deleted successfully.');

        return redirect(route('students.index'));
    }
}
