<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserAdmin extends Component
{
    public $status;
    public $type;
    public function render()
    {
        return view('livewire.user-admin', ['types' => User::USER_TYPES]);
    }
}
