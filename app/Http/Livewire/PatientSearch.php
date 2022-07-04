<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class PatientSearch extends Component
{
    public $patient;
    public $model;
    public $description = '';


    public function selectPatient(Patient $patient)
    {
        $this->name = $patient->first_name . " " . $patient->last_name;
        $this->patient_id = $patient->id;

        $this->dispatchBrowserEvent('user-selected');
    }

    public function mount($patient)
    {
        if ($patient != null) {
            $this->name = $patient->first_name . " " . $patient->last_name;
            $this->patient_id = $patient->id;
        }
    }

    public $name = '';
    public $patient_id = 0;
    public $search = '';

    public function render()
    {
        return view('livewire.patient-search', [
            'patients' => Patient::whereLike('first_name', $this->search)->whereLike('last_name', $this->search)->limit(5)->get()
        ]);
    }
}
