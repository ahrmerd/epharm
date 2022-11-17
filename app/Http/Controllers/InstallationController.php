<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password;
use Vonage\Client;


class InstallationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->checkInstallation();
    }
    private $statuses;

    private function checkInstallation(): View|Redirector|RedirectResponse
    {
        if (!$this->checkDbConnections()) {
            return view('install', ['step' => 1]);
        }
        if (!$this->checkMigrations()) {
            return view('install', ['step' => 2]);
        }
        if (!$this->checkAdmins()) {
            return view('install', ['step' => 3, 'statuses' => $this->statuses]);
        }
        if (!$this->checkSMSconfig()) {
            return view('install', ['step' => 4, 'statuses' => $this->statuses]);
        }

        return redirect(route('dashboard'));
    }

    public function checkDbConnections()
    {
        try {
            DB::connection()->getPDO();
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }


    public function checkSMSconfig()
    {
        return (env('VONAGE_KEY', false) != false && env('VONAGE_SECRET', false) != false);

        // $client = new Client(
        //     new \Vonage\Client\Credentials\Basic(getenv('VONAGE_KEY'), getenv('VONAGE_SECRET')),
        // );
        // $client->client->sendRequest();
    }

    public function checkAdmins(): bool
    {
        $statuses = ['doctor' => $this->checkDoctorAdmin(), 'pharmacist' => $this->checkPharmacistAdmin(), 'receptionist' => $this->checkReceptionistAdmin()];
        foreach ($statuses as $status => $value) {
            if (!$value) {
                $this->statuses = $statuses;
                return false;
            }
        }
        return true;
    }

    private function checkDoctorAdmin(): bool
    {
        return User::query()
            ->where('user_type', '=', User::USER_TYPES['doctor'])
            ->where('is_admin', '=', 1)
            ->exists();
    }

    private function checkPharmacistAdmin()
    {
        return User::query()
            ->where('user_type', '=', User::USER_TYPES['pharmacist'])
            ->where('is_admin', '=', 1)
            ->exists();
    }

    private function checkReceptionistAdmin(): bool
    {
        return User::query()
            ->where('user_type', '=', User::USER_TYPES['receptionist'])
            ->where('is_admin', '=', 1)
            ->exists();
    }

    private function checkMigrations()
    {
        $tables = ['users', 'patients', 'prescriptions', 'appointments', 'drugs', 'medications', 'notifications'];
        //eturn Schema::hasTable()
        foreach ($tables as $table) {
            if (!Schema::hasTable($table)) {
                return false;
            }
        }
        return true;
    }

    public function migrate()
    {
        if (!$this->checkMigrations()) {
            Artisan::call('migrate', [
                '--force' => true
            ]);
        }
        return redirect()->back();
    }

    public function migrateFresh()
    {
        if (!$this->checkMigrations()) {
            Artisan::call('migrate:fresh', [
                // '--database' => 'dynamicdb',
                '--force' => true
            ]);
        }
        return redirect()->back();
    }


    public function createAdmin(Request $request)
    {
        if (!$this->checkAdmins()) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'regex:/^\+\d{12,14}$/'],
                'user_type' => ['required', 'integer', 'between:1,5'],
                'password' => ['required', 'confirmed', Password::min(4)],
            ]);

            User::query()->updateOrCreate(
                ['username' => 'admin_' . $request->input('user_type')],
                [
                    'first_name' => 'admin',
                    'last_name' => array_flip(User::USER_TYPES)[$request->user_type],
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => 'Work',
                    'user_type' => $request->user_type,
                    'is_admin' => true,
                    'password' => Hash::make($request->password),
                ]
            );
        }
        return redirect()->back();
    }
}
