<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class PatientController extends Controller
{

    private function getPatients()
    {
        $search = request('search');
        $patients = Patient::query()->when(
            $search,
            fn ($query) =>
            $query->whereLike('first_name', $search)
                ->whereLike('last_name', $search)
                ->whereLike('phone', $search)
                ->whereLike('email', $search),
        );
        return $patients->latest()->paginate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index', ['patients' => $this->getPatients()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('patients.create', ['genders' => Patient::GENDERS, 'blood_groups' => Patient::BLOODGROUPS, 'blood_genotypes' => Patient::BLOODGENOTYPES]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPrescription($patient)
    {
        $patient = Patient::query()->findOrFail($patient);
        return view('prescriptions.create', ['patient' => $patient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        Patient::create($request->only(
            [
                'first_name', 'last_name', 'birth_date',
                'gender', 'blood_group', 'blood_genotype',
                'allergies', 'email', 'phone', 'address'
            ]
        ));
        return redirect(route('patients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return "in development";
        // return view('patients.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        return $patient->delete();
    }
}
