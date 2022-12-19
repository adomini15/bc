<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class EditCustomerForm extends Component
{
    public $_id;
    // Form properties
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $area;
    public $province;
    public $comment;
 
    private function getValidationRules() {
        return [
            'firstname' => ['required', 'min:3', 'max:45'],
            'lastname' => ['required', 'min:3', 'max:75'],
            'email' => ['required', "email", "unique:customers,email,$this->_id"],
            'phone' => ['required', 'min:10', 'max:12'],
            'address' => ['required', 'max:75'],
            'province' => ['required', 'max:75'],
            'area' => ['required', 'max:75'],
            'comment' => ['required', 'max:255']
        ];
    }

    public function mount($customer) {
        $this->_id = $customer->id;
        $this->firstname = $customer->firstname;
        $this->lastname = $customer->lastname;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
        $this->area = $customer->area;
        $this->province = $customer->province;
        $this->comment = $customer->comment;
        
    }

    public function submit()
    {
        $this->validate($this->getValidationRules());

        $customer = Customer::find($this->_id);

        $customer->firstname = $this->firstname;
        $customer->lastname = $this->lastname;
        $customer->email = $this->email;
        $customer->phone = $this->phone;
        $customer->address = $this->address;
        $customer->area = $this->area;
        $customer->province = $this->province;
        $customer->comment = $this->comment;

        $customer->save();

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/customers')->with('update', 'ok');
    }


    public function render()
    {
        return view('livewire.edit-customer-form');
    }
}
