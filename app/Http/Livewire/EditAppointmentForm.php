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
 
    private function getValidationRules() {
        return [
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
    }

    public function mount($appointment) {
        $this->_id = $appointment->id;
        $this->customer_id = $appointment->customer_id;
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

        $appointment = Appointment::find($this->_id);

        $appointment->taken_date = $this->taken_date;
        $appointment->beautician_id = $this->beautician_id;
        $appointment->service_id = $this->service_id;
        $appointment->customer_id = $this->customer_id;

        $appointment->save();

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/appointments')->with('update', 'ok');
    }


    public function render()
    {
        $services = Service::all();
        $beauticians = Beautician::all();
        $customers = Customer::all();

        return view('livewire.edit-appointment-form', compact('services', 'beauticians', 'customers'));
    }
}
