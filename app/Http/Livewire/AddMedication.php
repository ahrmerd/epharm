<?php

namespace App\Http\Livewire;

use App\Models\Drug;
use Livewire\Component;

class AddMedication extends Component
{
    public $prescription_id;
    public $medication;
    public function render()
    {
        $drugs = [];
        foreach (Drug::all()->toArray() as $value) {
            $drugs[$value['name']] = $value['id'];
            // dump($key);
        }

        // dump($drugs);

        return view('livewire.add-medication', ['drugs' => $drugs]);
    }
}
