<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use App\Services\NotificationService;

class AppointmentController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct(private NotificationService $notifier)
    {
        $this->authorizeResource(Appointment::class, 'appointment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index', ['appointments' => Appointment::query()->timeLatest()->paginate()]);
    }


    public function user()
    {
        return view('appointments.index', ['appointments' => auth()->user()->appointments()->timeLatest()->paginate()]);
        // return view('prescriptions.index', ['user' => $user, 'prescriptions' => $user->isDoctorOrPharmacist() ? auth()->user()->prescriptions()->paginate() : new Collection([])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = null;
        $with = [
            'statuses' => Appointment::APPOINTMENT_STATUSES,
            'user' => null,
            'patient' => null
        ];
        request()->whenHas('user_id', function ($value) use (&$with) {
            $with['user'] = User::query()->find($value);
        });
        request()->whenHas('patient_id', function ($value) use (&$with) {
            $with['patient'] = Patient::query()->find($value);
        });
        return view('appointments.create', $with);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        // dump('ok');
        $appointment = Appointment::create($request->only(['user_id', 'patient_id', 'status', 'reason', 'date_time']));
        // dump('done');
        $this->notifier->appointmentNotification($appointment);
        return redirect(route('appointments.show', $appointment->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', ['appointment' => $appointment, 'statuses' => Appointment::APPOINTMENT_STATUSES]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->only(['user_id', 'patient_id', 'status', 'reason', 'date_time']));
        $this->notifier->appointmentNotification($appointment);
        return redirect(route('appointments.show', $appointment->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect(route('appointments.index'));
    }
}
