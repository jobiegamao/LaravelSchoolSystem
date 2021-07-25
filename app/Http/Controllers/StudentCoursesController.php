<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudent_CoursesRequest;
use App\Http\Requests\UpdateStudent_CoursesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Student_Courses;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentCoursesController extends AppBaseController
{
    /**
     * Display a listing of the Student_Courses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::all();

        return view('students_courses.index')
            ->with('studentCourses', $studentCourses);
    }

    /**
     * Show the form for creating a new Student_Courses.
     *
     * @return Response
     */
    public function create()
    {
        return view('students_courses.create');
    }

    /**
     * Store a newly created Student_Courses in storage.
     *
     * @param CreateStudent_CoursesRequest $request
     *
     * @return Response
     */
    public function store(CreateStudent_CoursesRequest $request)
    {
        $input = $request->all();

        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::create($input);

        Flash::success('Student Courses saved successfully.');

        return redirect(route('studentCourses.index'));
    }

    /**
     * Display the specified Student_Courses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::find($id);

        if (empty($studentCourses)) {
            Flash::error('Student  Courses not found');

            return redirect(route('studentCourses.index'));
        }

        return view('students_courses.show')->with('studentCourses', $studentCourses);
    }

    /**
     * Show the form for editing the specified Student_Courses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::find($id);

        if (empty($studentCourses)) {
            Flash::error('Student  Courses not found');

            return redirect(route('studentCourses.index'));
        }

        return view('students_courses.edit')->with('studentCourses', $studentCourses);
    }

    /**
     * Update the specified Student_Courses in storage.
     *
     * @param int $id
     * @param UpdateStudent_CoursesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudent_CoursesRequest $request)
    {
        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::find($id);

        if (empty($studentCourses)) {
            Flash::error('Student Courses not found');

            return redirect(route('studentCourses.index'));
        }

        $studentCourses->fill($request->all());
        $studentCourses->save();

        Flash::success('Student  Courses updated successfully.');

        return redirect(route('studentCourses.index'));
    }

    /**
     * Remove the specified Student_Courses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Student_Courses $studentCourses */
        $studentCourses = Student_Courses::find($id);

        if (empty($studentCourses)) {
            Flash::error('Student  Courses not found');

            return redirect(route('studentCourses.index'));
        }

        $studentCourses->delete();

        Flash::success('Student  Courses deleted successfully.');

        return redirect(route('studentCourses.index'));
    }
}
