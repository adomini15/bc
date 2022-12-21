<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Beautician;
use App\Models\Customer;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use App\Mail\AppointmentMailable;
use Illuminate\Support\Facades\Mail;


class CreateAppointmentForm extends Component
{
    public $currentPage = 1;

    // Form properties
    public $customer_id;
    public $service_id;
    public $beautician_id;
    public $taken_date;

    public $pages = [
        1 => [
            'heading' => 'Cliente'
        ],
        2 => [
            'heading' => 'Servicio'
        ],
        3 => [
            'heading' => 'Fecha y Hora'
        ]
    ];

    // Validation Rules
    private $validationRules = [
        1 => [
            'customer_id' => ['required', 'exists:customers,id']
        ],
        2 => [
            'service_id' => ['required', 'exists:services,id'],
            'beautician_id' => ['required', 'exists:beauticians,id']
        ],
        3 => [
            'taken_date' => ['required']
        ]
    ];

    public function goToNextPage() {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;

    }

    public function goToPreviousPage() {
        $this->currentPage--;
    }

    public function submit()
    {
        
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        $appointment = Appointment::create([
            'taken_date' => $this->taken_date,
            'beautician_id' => $this->beautician_id,
            'service_id' => $this->service_id,
            'customer_id' => $this->customer_id
        ]);

        $this->reset();
        $this->resetValidation();

        $confirmationUrl = URL::temporarySignedRoute('admin.appointments.confirmed', now()->addWeek(), [
            'appointment' => $appointment->id
        ]);

        $email = new AppointmentMailable($appointment, $confirmationUrl);

        Mail::to($appointment->customer->email)->send($email);


        return redirect('/admin/appointments')->with('store', 'ok');
    }


    public function render()
    {
        $services = Service::all();
        $beauticians = Beautician::all();
        $customers = Customer::all();

        return view('livewire.create-appointment-form', compact('services', 'beauticians', 'customers'));
    }
}
