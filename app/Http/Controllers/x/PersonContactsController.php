<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonContactsRequest;
use App\Http\Requests\UpdatePersonContactsRequest;
use App\Repositories\PersonContactsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersonContactsController extends AppBaseController
{
    /** @var  PersonContactsRepository */
    private $personContactsRepository;

    public function __construct(PersonContactsRepository $personContactsRepo)
    {
        $this->personContactsRepository = $personContactsRepo;
    }

    /**
     * Display a listing of the PersonContacts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personContacts = $this->personContactsRepository->all();

        return view('person_contacts.index')
            ->with('personContacts', $personContacts);
    }

    /**
     * Show the form for creating a new PersonContacts.
     *
     * @return Response
     */
    public function create()
    {
        return view('person_contacts.create');
    }

    /**
     * Store a newly created PersonContacts in storage.
     *
     * @param CreatePersonContactsRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonContactsRequest $request)
    {
        $input = $request->all();

        $personContacts = $this->personContactsRepository->create($input);

        Flash::success('Person Contacts saved successfully.');

        return redirect(route('personContacts.index'));
    }

    /**
     * Display the specified PersonContacts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personContacts = $this->personContactsRepository->find($id);

        if (empty($personContacts)) {
            Flash::error('Person Contacts not found');

            return redirect(route('personContacts.index'));
        }

        return view('person_contacts.show')->with('personContacts', $personContacts);
    }

    /**
     * Show the form for editing the specified PersonContacts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personContacts = $this->personContactsRepository->find($id);

        if (empty($personContacts)) {
            Flash::error('Person Contacts not found');

            return redirect(route('personContacts.index'));
        }

        return view('person_contacts.edit')->with('personContacts', $personContacts);
    }

    /**
     * Update the specified PersonContacts in storage.
     *
     * @param int $id
     * @param UpdatePersonContactsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonContactsRequest $request)
    {
        $personContacts = $this->personContactsRepository->find($id);

        if (empty($personContacts)) {
            Flash::error('Person Contacts not found');

            return redirect(route('personContacts.index'));
        }

        $personContacts = $this->personContactsRepository->update($request->all(), $id);

        Flash::success('Person Contacts updated successfully.');

        return redirect(route('personContacts.index'));
    }

    /**
     * Remove the specified PersonContacts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personContacts = $this->personContactsRepository->find($id);

        if (empty($personContacts)) {
            Flash::error('Person Contacts not found');

            return redirect(route('personContacts.index'));
        }

        $this->personContactsRepository->delete($id);

        Flash::success('Person Contacts deleted successfully.');

        return redirect(route('personContacts.index'));
    }
}
