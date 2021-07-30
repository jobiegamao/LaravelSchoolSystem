<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassroomsRequest;
use App\Http\Requests\UpdateClassroomsRequest;
use App\Repositories\ClassroomsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClassroomsController extends AppBaseController
{
    /** @var  ClassroomsRepository */
    private $classroomsRepository;

    public function __construct(ClassroomsRepository $classroomsRepo)
    {
        $this->classroomsRepository = $classroomsRepo;
    }

    /**
     * Display a listing of the Classrooms.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $classrooms = $this->classroomsRepository->all();

        return view('classrooms.index')
            ->with('classrooms', $classrooms);
    }

    /**
     * Show the form for creating a new Classrooms.
     *
     * @return Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created Classrooms in storage.
     *
     * @param CreateClassroomsRequest $request
     *
     * @return Response
     */
    public function store(CreateClassroomsRequest $request)
    {
        $input = $request->all();

        $classrooms = $this->classroomsRepository->create($input);

        Flash::success('Classrooms saved successfully.');

        return redirect(route('classrooms.index'));
    }

    /**
     * Display the specified Classrooms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classrooms = $this->classroomsRepository->find($id);

        if (empty($classrooms)) {
            Flash::error('Classrooms not found');

            return redirect(route('classrooms.index'));
        }

        return view('classrooms.show')->with('classrooms', $classrooms);
    }

    /**
     * Show the form for editing the specified Classrooms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classrooms = $this->classroomsRepository->find($id);

        if (empty($classrooms)) {
            Flash::error('Classrooms not found');

            return redirect(route('classrooms.index'));
        }

        return view('classrooms.edit')->with('classrooms', $classrooms);
    }

    /**
     * Update the specified Classrooms in storage.
     *
     * @param int $id
     * @param UpdateClassroomsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassroomsRequest $request)
    {
        $classrooms = $this->classroomsRepository->find($id);

        if (empty($classrooms)) {
            Flash::error('Classrooms not found');

            return redirect(route('classrooms.index'));
        }

        $classrooms = $this->classroomsRepository->update($request->all(), $id);

        Flash::success('Classrooms updated successfully.');

        return redirect(route('classrooms.index'));
    }

    /**
     * Remove the specified Classrooms from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classrooms = $this->classroomsRepository->find($id);

        if (empty($classrooms)) {
            Flash::error('Classrooms not found');

            return redirect(route('classrooms.index'));
        }

        $this->classroomsRepository->delete($id);

        Flash::success('Classrooms deleted successfully.');

        return redirect(route('classrooms.index'));
    }
}
