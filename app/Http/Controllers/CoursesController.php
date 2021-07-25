<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Courses;
use Illuminate\Http\Request;
use Flash;
use Response;

class CoursesController extends AppBaseController
{
    /**
     * Display a listing of the Courses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Courses $courses */
        $courses = Courses::all();

        return view('courses.index')
            ->with('courses', $courses);
    }

    /**
     * Show the form for creating a new Courses.
     *
     * @return Response
     */
    public function create()
    {
        $courses = Courses::all();
        return view('courses.create')->with('courses', $courses);
    }

    /**
     * Store a newly created Courses in storage.
     *
     * @param CreateCoursesRequest $request
     *
     * @return Response
     */
    public function store(CreateCoursesRequest $request)
    {
        $input = $request->all();

        /** @var Courses $courses */
        $courses = Courses::create($input);

        Flash::success('Courses saved successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified Courses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Courses $courses */
        $courses = Courses::find($id);

        if (empty($courses)) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        return view('courses.show')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified Courses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Courses $courses */
        $courses = Courses::find($id);

        if (empty($courses)) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        return view('courses.edit')->with('courses', $courses);
    }

    /**
     * Update the specified Courses in storage.
     *
     * @param int $id
     * @param UpdateCoursesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoursesRequest $request)
    {
        /** @var Courses $courses */
        $courses = Courses::find($id);

        if (empty($courses)) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        $courses->fill($request->all());
        $courses->save();

        Flash::success('Courses updated successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified Courses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Courses $courses */
        $courses = Courses::find($id);

        if (empty($courses)) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        $courses->delete();

        Flash::success('Courses deleted successfully.');

        return redirect(route('courses.index'));
    }

    public function list(){
        
        $courses = Courses::all();
        return back()->with('courses', $courses);
    }
}
