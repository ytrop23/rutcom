<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\Clients;
use App\Http\Livewire\ClientActive;
use App\Http\Livewire\ClientsExcel;
use App\Http\Livewire\ClientsMap;
use App\Http\Livewire\TableLocation;
use App\Http\Livewire\Calendar;
use App\Http\Controllers\TimeControl;
use App\Http\Livewire\Tasks;
use App\Http\Livewire\Listappointments;
use App\Http\Livewire\RutcomMap;
use App\Http\Livewire\UserPermits;
use App\Http\Livewire\CreateAppointmentForm;
use App\Http\Livewire\CreateLocationForm;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', Tasks::class
)->name('tasks');
Route::middleware(['auth:sanctum', 'verified'])->get('/appointments', Listappointments::class
)->name('appointments');
Route::middleware(['auth:sanctum', 'verified'])->get('/routesMap', RutcomMap::class
)->name('routeMap');
Route::middleware(['auth:sanctum', 'verified'])->get('/routes', TableLocation ::class
)->name('routes');


Route::resource('timecontrol',TimeControl::class);
Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
Route::get('calendar', Calendar::class)->name('calendar');
Route::get('users/permits', UserPermits::class)->name('users.permits');
Route::get('clients/active', ClientActive::class)->name('clients.active');
Route::get('clients/export', ClientsExcel::class)->name('clients.export');
Route::get('routes/create', CreateLocationForm::class)->name('routes.create');
Route::get('routes/clients', ClientsMap::class)->name('routes.map');
