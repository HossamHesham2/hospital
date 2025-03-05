<?php

use App\Http\Controllers\DoctorManagerController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->name('patient.dashboard');
            Route::get('/doctors', 'showDoctors')->name('doctor.showDoctors');
            Route::get('/doctor/show/{id}', 'show')->name('doctor.show');
            Route::get('/profile/{id}', 'profile')->name('patient.profile');
            Route::post('/profileUpdate/{id}', 'updateProfile')->name('patient.profile_update');
            Route::get('/booking/{id}', 'booking')->name('patient.booking');
            Route::post('/makeBook/{id}', 'makeBook')->name('patient.makeBook');
            Route::get('/doneBooking', 'doneBooking')->name('patient.doneBooking');
            Route::delete('/cancelBook/{id}', 'cancelBook')->name('patient.cancelBook');
        });
    });
});
Route::middleware('doctor')->group(function () {
    Route::prefix('doctor')->group(function () {
        Route::controller(DoctorController::class)->group(function () {

            Route::get('/', 'index')->name('doctor.dashboard');
            Route::get('/profile/{id}', 'profile')->name('doctor.profile');
            Route::post('/profileUpdate/{id}', 'updateProfile')->name('doctor.profile_update');
            Route::post('/cancel/{id}', 'cancelAppointment')->name('cancel.appointment');
            Route::post('/accept/{id}', 'acceptAppointment')->name('accept.appointment');
            Route::get('/acceptedAppointments', 'acceptedAppointments')->name('doctor.acceptedAppointments');
        });
    });
});
Route::controller(DoctorManagerController::class)->group(function () {
    Route::match(['get', 'post'], '/doctorLogin', 'doctorLogin')->name('doctorLogin');
    Route::match(['get', 'post'], '/doctorRegister', 'doctorRegister')->name('doctorRegister');
    Route::post('/doctorLogout', 'doctorLogout')->name('doctorLogout');
});


