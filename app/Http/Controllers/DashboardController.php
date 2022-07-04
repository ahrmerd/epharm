<?php

namespace App\Http\Controllers;

use App\Models\{Appointment, Drug, Patient, Prescription, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', ['appointments' => $this->getAppointments(), 'drugs' => $this->getDrugs(), 'prescriptions' => $this->getPrescriptions(), 'user' => Auth::user()]);
    }

    public function getDrugs()
    {
        return Drug::query()->latest()->take(5)->get();
    }


    public function getPrescriptions()
    {
        $user = Auth::user();
        return ($user->isDoctorOrPharmacist()) ?
            $user->prescriptions()->latest()->take(5)->get()
            : Prescription::query()->latest()->take(5)->get();
    }


    public function getAppointments()
    {
        $user = Auth::user();
        if ($user->isDoctorOrPharmacist()) {
            return $user->appointments()->active()->timeLatest()->with('patient')->take(5)->get();
        } else {
            return Appointment::query()->active()->timeLatest()->with('patient')->take(5)->get();
        }
    }
}
