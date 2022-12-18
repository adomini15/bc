<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Beautician;
use App\Models\Customer;
use App\Models\Service;
use Livewire\Component;

class CreateAppointmentForm extends Component
{
    public $currentPage = 1;

    // Form properties
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $area;
    public $province;
    public $comment;
    public $service_id;
    public $beautician_id;
    public $taken_date;

    public $pages = [
        1 => [
            'heading' => 'Datos Personales'
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
            'firstname' => ['required', 'min:3', 'max:45'],
            'lastname' => ['required', 'min:3', 'max:75'],
            'email' => ['required', 'email', 'unique:customers,email'],
            'phone' => ['required', 'min:10', 'max:12'],
            'address' => ['required', 'max:75'],
            'province' => ['required', 'max:75'],
            'area' => ['required', 'max:75'],
            'comment' => ['required', 'max:255']
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

        $customer = Customer::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'area' => $this->area,
            'province' => $this->province,
            'comment' => $this->comment
        ]);

        Appointment::create([
            'taken_date' => $this->taken_date,
            'beautician_id' => $this->beautician_id,
            'service_id' => $this->service_id,
            'customer_id' => $customer->id
        ]);

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/appointments');
    }


    public function render()
    {
        $services = Service::all();
        $beauticians = Beautician::all();

        return view('livewire.create-appointment-form', compact('services', 'beauticians'));
    }
}
