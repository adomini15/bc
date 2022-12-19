<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class CreateServiceForm extends Component
{
    // Form properties
    public $title;
    public $description;
    public $price;

    // Validation Rules
    private $validationRules = [
        'title' => ['required', 'min:3', 'max:75', 'unique:services,title'],
        'description' => ['required', 'max:255'],
        'price' => ['required', 'regex:/^(\d+(,\d{1,2})?)?$/']
    ];

    public function submit()
    {
        $this->validate($this->validationRules);

        Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/services')->with('store', 'ok');
    }


    public function render()
    {
        return view('livewire.create-service-form');
    }
}
