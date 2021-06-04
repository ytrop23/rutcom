<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Calendar;
use App\Http\Controllers\TimeControl;
use App\Http\Controllers\ChartController;
use App\Http\Livewire\Listappointments;
use App\Http\Livewire\CreateAppointmentForm ;
use App\Http\Livewire\UpdateAppointmentForm ;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', UsersTable::class
)->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/clients', Clients::class
)->name('clients');
Route::middleware(['auth:sanctum', 'verified'])->get('/calendar', Calendar::class
)->name('calendar');
Route::middleware(['auth:sanctum', 'verified'])->get('/appointments', Listappointments::class
)->name('appointments');
Route::resource('timecontrol',TimeControl::class);
Route::get('line-chart', [ChartController::class, 'showChart']);
//Route::get('appointments', Listappointments::class)->name('appointments');
Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
Route::get('appointments/edit', UpdateAppointmentForm::class)->name('appointments.edit');

