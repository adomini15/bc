<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class AppointmentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $appointments = Appointment::all();

        return view('admin.appointments.index', compact('appointments'));
    }
}
