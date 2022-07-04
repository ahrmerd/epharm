<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePatientRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', Rule::in(Patient::GENDERS)],
            'birth_date' => ['required', 'date'],
            'blood_group' => ['required', 'string', Rule::in(Patient::BLOODGROUPS)],
            'blood_genotype' => ['required', 'string', Rule::in(Patient::BLOODGENOTYPES)],
            'allergies' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'phone' => ['required', 'string', 'regex:/^\+\d{12,14}$/'],
            'address' => ['required', 'string', 'max:255']
        ];
    }
}
