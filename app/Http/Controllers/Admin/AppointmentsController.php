<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use DateTimeZone;

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
    
    public function confirm(Appointment $appointment) {
        $isConfirmed = $appointment->confirmation_date ? true : false;
        $appointmentId = $appointment->id;

        return view('admin.appointments.confirm', compact('isConfirmed', 'appointmentId'));
    }

    public function confirmed() {
         $id = +request()->all()['id'];

         $appointment = Appointment::find($id);

         $appointment->confirmation_date = Carbon::now(new DateTimeZone("America/Santo_Domingo"));

         $appointment->save();

         return response()->json([ "appointment" => $appointment], 200);
    }

    public function cancel() {
        $id = +request()->all()['id'];

        Appointment::find($id)->delete();

        return response()->noContent();
    }
 
}
