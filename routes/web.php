<?php

use App\Http\Controllers\{
    AppointmentController,
    DashboardController,
    DrugController,
    PrescriptionController,
    PatientController,
    MedicationController,
    NotificationController,
    UserController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('prescriptions/user', [PrescriptionController::class, 'user'])->name('prescriptions.user')->middleware('auth');
Route::get('appointments/user', [AppointmentController::class, 'user'])->name('appointments.user')->middleware('auth');
Route::get('users/user', [UserController::class, 'user'])->name('users.user')->middleware('auth');
Route::post('users/{user}/promote', [UserController::class, 'promoteToAdmin'])->name('users.promote')->middleware('auth');
Route::post('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.change-password')->middleware('auth');
Route::get('patients/{id}/prescriptions', [PatientController::class, 'createPrescription'])->name('patients.prescriptions.create')->middleware('auth');
Route::post('prescription/{prescription}', [PrescriptionController::class, 'notify'])->name('prescriptions.notify');
Route::get('notifications', NotificationController::class)->middleware('auth')->name('notifications');

Route::get('/', function () {
    return redirect(route('dashboard'));
});

// Route::post('appointments', [AppointmentController::class, 'store']);

Route::resource('drugs', DrugController::class)->middleware('auth');
Route::resource('patients', PatientController::class)->middleware('auth');
Route::resource('appointments', AppointmentController::class)->middleware('auth');
Route::resource('prescriptions', PrescriptionController::class)->middleware('auth');
Route::resource('medications', MedicationController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');


Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
// });

require __DIR__ . '/auth.php';
