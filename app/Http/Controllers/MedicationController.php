<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicationRequest;
use App\Models\Medication;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medications.index', ['medication' => Medication::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicationRequest $request)
    {
        // dump($request->only(['drug_id', 'prescription_id', 'dosage', 'notes']));
        Medication::query()->create($request->only(['drug_id', 'prescription_id', 'dosage', 'notes']));
        return redirect(route('prescriptions.show', $request->input('prescription_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function show(Medication $medication)
    {
        return view('medications.show', ['medication' => $medication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function edit(Medication $medication)
    {
        return view('medications.edit', ['medication' => $medication]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicationRequest  $request
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        $medication->update($request->only(['drug_id', 'dosage', 'notes']));

        return redirect(route('prescriptions.show', $medication->prescription->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        $medication->delete();
        return redirect(route('prescriptions.show', $medication->prescription->id));
    }
}
