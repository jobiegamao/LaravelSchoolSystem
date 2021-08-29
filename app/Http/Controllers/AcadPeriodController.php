<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcadPeriodRequest;
use App\Http\Requests\UpdateAcadPeriodRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AcadPeriod;
use Illuminate\Http\Request;
use Flash;
use Response;

class AcadPeriodController extends AppBaseController
{
    /**
     * Display a listing of the AcadPeriod.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       
        $acadPeriods = AcadPeriod::all();
        $current_year = AcadPeriod::latest()->value('acadYear');
        $current_sem = AcadPeriod::latest()->value('acadSem');

        return view('menu_Registrar/acad_periods/index', [
            'acadPeriods' => $acadPeriods,
            'current_year' =>$current_year,
            'current_sem' => $current_sem
        ]);
    }

    /**
     * Show the form for creating a new AcadPeriod.
     *
     * @return Response
     */
    public function create()
    {
        return view('menu_Registrar/acad_periods/create');
    }

    /**
     * Store a newly created AcadPeriod in storage.
     *
     * @param CreateAcadPeriodRequest $request
     *
     * @return Response
     */
    public function store(CreateAcadPeriodRequest $request)
    {
        $input = $request->all();

        /** @var AcadPeriod $acadPeriod */
        $acadPeriod = AcadPeriod::create($input);

        Flash::success('Acad Period saved successfully.');

        return redirect(route('acadPeriods.index'));
    }

   

    /**
     * Show the form for editing the specified AcadPeriod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AcadPeriod $acadPeriod */
        $acadPeriod = AcadPeriod::find($id);

        if (empty($acadPeriod)) {
            Flash::error('Academic Period not found');

            return redirect(route('acadPeriods.index'));
        }

        return view('menu_Registrar/acad_periods/edit')->with('acadPeriod', $acadPeriod);
    }

    /**
     * Update the specified AcadPeriod in storage.
     *
     * @param int $id
     * @param UpdateAcadPeriodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcadPeriodRequest $request)
    {
        /** @var AcadPeriod $acadPeriod */
        $acadPeriod = AcadPeriod::find($id);

        if (empty($acadPeriod)) {
            Flash::error('Acad Period not found');

            return redirect(route('acadPeriods.index'));
        }

        $acadPeriod->fill($request->all());
        $acadPeriod->save();

        Flash::success('Academic Period updated successfully.');

        return redirect(route('acadPeriods.index'));
    }

    public function destroy($id){
        $acadPeriod = AcadPeriod::find($id);
        $acadPeriod->delete($id);
        Flash::success('Academic Period deleted successfully.');
        return redirect(route('acadPeriods.index'));
    }

    
}
