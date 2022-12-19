<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CreateCustomerForm extends Component
{
    // Form properties
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $area;
    public $province;
    public $comment;

    // Validation Rules
    private $validationRules = [
        'firstname' => ['required', 'min:3', 'max:45'],
        'lastname' => ['required', 'min:3', 'max:75'],
        'email' => ['required', 'email', 'unique:customers,email'],
        'phone' => ['required', 'min:10', 'max:12'],
        'address' => ['required', 'max:75'],
        'province' => ['required', 'max:75'],
        'area' => ['required', 'max:75'],
        'comment' => ['required', 'max:255']
    ];

    public function submit()
    {

        $this->validate($this->validationRules);

        Customer::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'area' => $this->area,
            'province' => $this->province,
            'comment' => $this->comment
        ]);

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/customers')->with('store', 'ok');
    }


    public function render()
    {
        return view('livewire.create-customer-form');
    }
}
