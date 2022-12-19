<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Client\Request;

class AppointmentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $appointments = Appointment::all();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create() {
        return view('admin.appointments.create');
    }

    public function edit(Appointment $appointment) {
        return view('admin.appointments.edit', [
            'appointment' => $appointment
        ]);
    }

    public function destroy(Appointment $appointment) {
        $appointment->delete();

        return redirect('/admin/appointments')->with('delete', 'ok');
    }
 
}
