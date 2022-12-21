<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $numberOfAvailableServices = Service::all()->count();
        $numberOfAliveCustomers = Customer::all()->count();
        $numberOfAliveAppointments = Appointment::all()->count();

        $numberOfCustomersWithTrashed = Customer::withTrashed()->count();
        $numberOfTrashedCustomers = Customer::onlyTrashed()->count();
        $numberOfAppointmentsWithTrashed = Appointment::withTrashed()->count();
        $numberOfTrashedAppointments = Appointment::onlyTrashed()->count();
        
        $percentOfTrashedAppointments = $numberOfAppointmentsWithTrashed ?? round($numberOfTrashedAppointments / $numberOfAppointmentsWithTrashed * 100, 2);
        $percentOfTrashedCustomers = $numberOfCustomersWithTrashed ?? round($numberOfTrashedCustomers / $numberOfCustomersWithTrashed * 100, 2);

        return view('home', compact(
            'numberOfAliveCustomers',
            'numberOfAliveAppointments',
            'percentOfTrashedAppointments',
            'percentOfTrashedCustomers',
            'numberOfAvailableServices'
            )
        );
    }
}
