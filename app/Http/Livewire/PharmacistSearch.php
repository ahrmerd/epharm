<?php


namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PharmacistSearch extends Component
{
    public $model;
    public $name;
    public $description = ' for';
    public $user;


    public $username = '';
    public $user_id = 0;
    public $search = '';
    public function selectUser(User $user)
    {
        $this->username = $user->username;
        $this->user_id = $user->id;

        $this->dispatchBrowserEvent('user-selected');
    }

    public function mount($user)
    {
        if ($user != null) {
            $this->username = $user->username;
            $this->user_id = $user->id;
        }
    }

    public function render()
    {
        return view('livewire.user-search', [
            'users' => User::query()->whereLike('username', $this->search)->where('user_type', '=', User::USER_TYPES['pharmacist'])->limit(5)->get(),
        ]);
    }
}
