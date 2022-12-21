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

        // For area chart
        $numberOfTrashedAppointmentsForMonths = Appointment::onlyTrashed()->get()->sortBy(function($service){ 
                return -$service->deleted_at->month; 
            })->groupBy(function($service){ 
                return $service->deleted_at->month; 
            })->map->count();

        $numberOfAliveAppointmentsForMonths = Appointment::all()->sortBy(function($service){ 
                return -$service->created_at->month; 
            })->groupBy(function($service){ 
                return $service->created_at->month; 
            })
            ->map->count();

        return view('home', compact(
            'numberOfAliveCustomers',
            'numberOfAliveAppointments',
            'percentOfTrashedAppointments',
            'percentOfTrashedCustomers',
            'numberOfAvailableServices',
            'numberOfTrashedAppointmentsForMonths',
            'numberOfAliveAppointmentsForMonths'
            )
        );
    }
}
