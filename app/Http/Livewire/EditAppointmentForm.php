<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Beautician;
use App\Models\Customer;
use App\Models\Service;
use Livewire\Component;

class EditAppointmentForm extends Component
{

    public $currentPage = 1;

    public $_id;
    public $customer_id;
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
 
    private function getValidationRules() {
        return [
            1 => [
                'firstname' => ['required', 'min:3', 'max:45'],
                'lastname' => ['required', 'min:3', 'max:75'],
                'email' => ['required', "email", "unique:customers,email,$this->_id"],
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
    }

    public function mount($appointment) {
        $this->_id = $appointment->id;
        $this->customer_id = $appointment->customer_id;
        $this->firstname = $appointment->customer->firstname;
        $this->lastname = $appointment->customer->lastname;
        $this->email = $appointment->customer->email;
        $this->phone = $appointment->customer->phone;
        $this->address = $appointment->customer->address;
        $this->area = $appointment->customer->area;
        $this->province = $appointment->customer->province;
        $this->comment = $appointment->customer->comment;
        $this->service_id = $appointment->service_id;
        $this->beautician_id = $appointment->beautician_id;
        $this->taken_date = $appointment->taken_date;

        
    }
    public function goToNextPage() {
        $this->validate($this->getValidationRules()[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage() {
        $this->currentPage--;
    }

    public function submit()
    {
        $rules = collect($this->getValidationRules())->collapse()->toArray();

        $this->validate($rules);

        $customer = Customer::find($this->customer_id);

        $customer->firstname = $this->firstname;
        $customer->lastname = $this->lastname;
        $customer->email = $this->email;
        $customer->phone = $this->phone;
        $customer->address = $this->address;
        $customer->area = $this->area;
        $customer->province = $this->province;
        $customer->comment = $this->comment;

        $customer->save();


        $appointment = Appointment::find($this->_id);

        $appointment->taken_date = $this->taken_date;
        $appointment->beautician_id = $this->beautician_id;
        $appointment->service_id = $this->service_id;

        $appointment->save();

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/appointments')->with('update', 'ok');
    }


    public function render()
    {
        $services = Service::all();
        $beauticians = Beautician::all();

        return view('livewire.edit-appointment-form', compact('services', 'beauticians'));
    }
}
