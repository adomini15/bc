<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/admin/appointments', [App\Http\Controllers\Admin\AppointmentsController::class, 'index'])
->name('admin.appointments');

Route::get('/admin/appointments/create', [App\Http\Controllers\Admin\AppointmentsController::class, 'create'])
->name('admin.appointments.create');

Route::get('/admin/appointments/{appointment}/edit', [App\Http\Controllers\Admin\AppointmentsController::class, 'edit'])
->name('admin.appointments.edit');

