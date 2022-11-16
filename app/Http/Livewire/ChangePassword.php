<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangePassword extends Component
{
    public $user;
    public function render()
    {

        return view('livewire.change-password');
    }
}
