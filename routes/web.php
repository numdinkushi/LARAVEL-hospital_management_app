<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addView']);

Route::get('/manage-appointments', [AdminController::class, 'manage_appointments']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::get('/approve-appointment/{id}', [AdminController::class, 'approve']);

Route::get('/reject-appointment/{id}', [AdminController::class, 'rejectAppointment']);

Route::get('/show-doctors', [AdminController::class, 'showDoctors']);

Route::get('/delete-doctor/{id}', [AdminController::class, 'deleteDoctor']);

Route::get('/update-doctor/{id}', [AdminController::class, 'updateDoctor']);

Route::post('/edit-doctor/{id}', [AdminController::class, 'editDoctor']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/my-appointment', [HomeController::class, 'my_appointment']);


Route::get('/cancel-appointment/{id}', [HomeController::class, 'cancel_appointment']);



