<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

// appointments
Route::get('/admin/appointments', [App\Http\Controllers\Admin\AppointmentsController::class, 'index'])
->name('admin.appointments');

Route::get('/admin/appointments/create', [App\Http\Controllers\Admin\AppointmentsController::class, 'create'])
->name('admin.appointments.create');

Route::get('/admin/appointments/{appointment}/edit', [App\Http\Controllers\Admin\AppointmentsController::class, 'edit'])
->name('admin.appointments.edit');

Route::delete('/admin/appointments/{appointment}/delete', [App\Http\Controllers\Admin\AppointmentsController::class, 'destroy'])
->name('admin.appointments.destroy');

Route::get('/confirm/appointments/{appointment}', [App\Http\Controllers\Admin\AppointmentsController::class, 'confirm'])->name('admin.appointments.confirm')->middleware('signed');

Route::post('/confirmed/appointments', [App\Http\Controllers\Admin\AppointmentsController::class, 'confirmed'])->name('admin.appointments.confirmed');

// customers
Route::get('/admin/customers', [App\Http\Controllers\Admin\CustomersController::class, 'index'])
->name('admin.customers');

Route::get('/admin/customers/create', [App\Http\Controllers\Admin\CustomersController::class, 'create'])
->name('admin.customers.create');

Route::get('/admin/customers/{customer}/edit', [App\Http\Controllers\Admin\CustomersController::class, 'edit'])
->name('admin.customers.edit');

Route::delete('/admin/customers/{customer}/delete', [App\Http\Controllers\Admin\CustomersController::class, 'destroy'])
->name('admin.customers.destroy');

// services
Route::get('/admin/services', [App\Http\Controllers\Admin\ServicesController::class, 'index'])
->name('admin.services');

Route::get('/admin/services/create', [App\Http\Controllers\Admin\ServicesController::class, 'create'])
->name('admin.services.create');

Route::get('/admin/services/{service}/edit', [App\Http\Controllers\Admin\ServicesController::class, 'edit'])
->name('admin.services.edit');

Route::delete('/admin/services/{service}/delete', [App\Http\Controllers\Admin\ServicesController::class, 'destroy'])
->name('admin.services.destroy');

// beauticians
Route::get('/admin/beauticians', [App\Http\Controllers\Admin\BeauticiansController::class, 'index'])
->name('admin.beauticians');

Route::get('/admin/beauticians/create', [App\Http\Controllers\Admin\BeauticiansController::class, 'create'])
->name('admin.beauticians.create');

Route::get('/admin/beauticians/{beautician}/edit', [App\Http\Controllers\Admin\BeauticiansController::class, 'edit'])
->name('admin.beauticians.edit');

Route::delete('/admin/beauticians/{beautician}/delete', [App\Http\Controllers\Admin\BeauticiansController::class, 'destroy'])
->name('admin.beauticians.destroy');
