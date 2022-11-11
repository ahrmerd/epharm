<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;


    public function asDoctor()
    {
        $user = User::factory()->create(['user_type' => User::USER_TYPES['doctor']]);
        Auth::login($user);
        return $this->actingAs(Auth::user());
    }
    public function asPharmacist()
    {
        $user = User::factory()->create(['user_type' => User::USER_TYPES['pharmacist']]);
        Auth::login($user);
        return $this->actingAs(Auth::user());
    }
    public function asReceptionist()
    {
        $user = User::factory()->create(['user_type' => User::USER_TYPES['receptionist']]);
        Auth::login($user);
        return $this->actingAs(Auth::user());
    }
}
