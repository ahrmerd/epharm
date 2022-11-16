<?php

namespace App\Services;

use App\Models\{Notification, Appointment, Prescription};

class NotificationService
{
    private function createNotification($user_id, $title, $message, $action = null): bool
    {
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->title = $title;
        $notification->message = $message;
        $notification->action = $action;
        return $notification->save();
    }

    function appointmentNotification(Appointment $appointment)
    {
        $time = \Carbon\Carbon::parse($appointment->date_time)->format('D, d/M h:i A');
        $title = 'Appointment Scheduled';
        $messsage = "You are scheduled for an appointment on {$time} with {$appointment->patient->full_name}";
        $action = route('appointments.show', $appointment->id);

        return $this->createNotification($appointment->user_id, $title, $messsage, $action);
    }

    function prescriptionNotification(Prescription $prescription)
    {
        return $this->pharmacistPrescriptionNotification($prescription)
            && $this->doctorPrescriptionNotification($prescription);
    }
    function pharmacistPrescriptionNotification(Prescription $prescription)
    {
        $title = 'Appointed as Pharmacist on a Prescription';
        $messsage = "You are the assigned pharmacist for "
            . $prescription->patient->full_name
            . ' prescription. please visit the link to add medications to the prescription';
        $action = route('prescriptions.show', $prescription->id);
        return $this->createNotification($prescription->pharmacist_id, $title, $messsage, $action);
    }

    function doctorPrescriptionNotification(Prescription $prescription)
    {
        $title = 'Appointed as the doctor on a Prescription';
        $messsage = "You are the assigned doctor for "
            . $prescription->patient->full_name
            . ' prescription. please visit the link to see the prescription';
        $action = route('prescriptions.show', $prescription->id);
        return $this->createNotification($prescription->doctor_id, $title, $messsage, $action);
    }
}
