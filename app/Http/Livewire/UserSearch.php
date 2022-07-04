<?php


namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSearch extends Component
{
    public $user;
    public $name = 'user_id';
    public $model;
    public $description = ' for';


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

    public $username = '';
    public $user_id = 0;
    public $search = '';
    public function render()
    {
        return view('livewire.user-search', [
            'users' => User::whereLike('username', $this->search)->limit(5)->get(),
        ]);
    }
}
