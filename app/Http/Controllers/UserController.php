<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::query()->paginate(), 'types' => array_flip(User::USER_TYPES)]);
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user, 'types' => array_flip(User::USER_TYPES)]);
    }


    public function user()
    {
        return view('users.show', ['user' => auth()->user(), 'types' => array_flip(User::USER_TYPES)]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only('first_name', 'last_name', 'phone_number', 'email', 'phone', 'address'));
        return redirect()->back();
    }

    public function promoteToAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->back();
    }


    public function changePassword(Request $request, User $user)
    {

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::min(4)],
        ]);
        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();
        return redirect()->back();
    }



    public function delete(User $user)
    {
        $user->delete();
        return redirect();
    }
}
