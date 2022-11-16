<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicationRequest extends FormRequest
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
            'drug_id' => ['required', 'exists:drugs,id'],
            'prescription_id' => ['required', 'exists:prescriptions,id'],
            'dosage' => ['required', 'string'],
            'notes' => ['nullable', 'string']
        ];
    }
}
