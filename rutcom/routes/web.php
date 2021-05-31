<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Calendar;
use App\Http\Controllers\TimeControl;
use App\Http\Controllers\ChartController;
use app\Http\Livewire\ListAppointments;


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
Route::resource('timecontrol',TimeControl::class);
Route::get('line-chart', [ChartController::class, 'showChart']);

Route::middleware(['auth:sanctum', 'verified'])->get('/appointments', ListAppointments::class
)->name('appointments');
