<?php

use App\Http\Controllers\{AppointmentController, DashboardController, DrugController, PrescriptionController, PatientController, MedicationController};
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

Route::get('prescriptions/user', [PrescriptionController::class, 'user'])->name('prescriptions.user');
Route::get('patients/{id}/prescriptions', [PatientController::class, 'createPrescription'])->name('patients.prescriptions.create');

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::resource('drugs', DrugController::class);
Route::resource('patients', PatientController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('prescriptions', PrescriptionController::class);


Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
// });

require __DIR__ . '/auth.php';
