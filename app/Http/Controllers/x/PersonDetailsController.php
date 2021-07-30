<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonDetailsRequest;
use App\Http\Requests\UpdatePersonDetailsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PersonDetails;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersonDetailsController extends AppBaseController
{
    /**
     * Display a listing of the PersonDetails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::all();

        return view('person_details.index')
            ->with('personDetails', $personDetails);
    }

    /**
     * Show the form for creating a new PersonDetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('person_details.create');
    }

    /**
     * Store a newly created PersonDetails in storage.
     *
     * @param CreatePersonDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonDetailsRequest $request)
    {
        $input = $request->all();

        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::create($input);

        Flash::success('Person Details saved successfully.');

        return redirect(route('personDetails.index'));
    }

    /**
     * Display the specified PersonDetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::find($id);

        if (empty($personDetails)) {
            Flash::error('Person Details not found');

            return redirect(route('personDetails.index'));
        }

        return view('person_details.show')->with('personDetails', $personDetails);
    }

    /**
     * Show the form for editing the specified PersonDetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::find($id);

        if (empty($personDetails)) {
            Flash::error('Person Details not found');

            return redirect(route('personDetails.index'));
        }

        return view('person_details.edit')->with('personDetails', $personDetails);
    }

    /**
     * Update the specified PersonDetails in storage.
     *
     * @param int $id
     * @param UpdatePersonDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonDetailsRequest $request)
    {
        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::find($id);

        if (empty($personDetails)) {
            Flash::error('Person Details not found');

            return redirect(route('personDetails.index'));
        }

        $personDetails->fill($request->all());
        $personDetails->save();

        Flash::success('Person Details updated successfully.');

        return redirect(route('personDetails.index'));
    }

    /**
     * Remove the specified PersonDetails from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PersonDetails $personDetails */
        $personDetails = PersonDetails::find($id);

        if (empty($personDetails)) {
            Flash::error('Person Details not found');

            return redirect(route('personDetails.index'));
        }

        $personDetails->delete();

        Flash::success('Person Details deleted successfully.');

        return redirect(route('personDetails.index'));
    }
}
