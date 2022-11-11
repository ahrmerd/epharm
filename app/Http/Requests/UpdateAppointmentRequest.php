<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'patient_id' => ['nullable', 'exists:patients,id'],
            'date_time' => ['nullable', 'date'],
            'status' => ['required', 'numeric', 'max:255', Rule::in(Appointment::APPOINTMENT_STATUSES)],
            'reason' => ['nullable', 'string']
        ];
    }
}
