<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\SMSService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct(private SMSService $smsService, private NotificationService $notifier)
    {
        $this->authorizeResource(Prescription::class, 'prescription');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prescriptions.index', ['prescriptions' => Prescription::paginate()]);
    }


    /**
     * Display a listing of the  resource belonging to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = Auth::user();
        return view('prescriptions.index', ['prescriptions' => auth()->user()->prescriptions()->paginate()]);
        // return view('prescriptions.index', ['user' => $user, 'prescriptions' => $user->isDoctorOrPharmacist() ? auth()->user()->prescriptions()->paginate() : new Collection([])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = null;
        request()->whenHas('patient_id', function ($value) use (&$patient) {
            $patient = Patient::query()->find($value);
        });
        return view('prescriptions.create', ['patient' => $patient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrescriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrescriptionRequest $request)
    {
        $prescription = Prescription::query()->create(['doctor_id' => auth()->user()->id, ...$request->only(['patient_id', 'pharmacist_id', 'diagnosis', 'notes'])]);
        $this->notifier->prescriptionNotification($prescription);
        return redirect(route('prescriptions.show', $prescription->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', ['prescription' => $prescription, 'medications' => $prescription->medications()->paginate()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        return view('prescriptions.edit', ['prescription' => $prescription]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrescriptionRequest  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrescriptionRequest $request, Prescription $prescription)
    {
        $prescription->update($request->only(['pharmacist_id', 'diagnosis', 'notes']));
        $this->notifier->prescriptionNotification($prescription);
        return redirect(route('prescriptions.show', $prescription->id));
    }


    public function notify(Prescription $prescription)
    {
        if ($this->smsService->sendMedicationSMS($prescription)) {
            return redirect()->back()->with('notice', 'Reminder Sent successfully');
        } else {
            return redirect()->back()->withErrors(['sms error', 'Something went wrong. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect(route('prescriptions.index'));
    }
}
