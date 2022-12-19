<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class EditServiceForm extends Component
{
    public $_id;
    public $title;
    public $description;
    public $price;

    private function getValidationRules() {
        return [
            'title' => ['required', 'min:3', 'max:75', "unique:services,title,$this->_id"],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^(\d+(,\d{1,2})?)?$/']
        ];
    }

    public function mount($service) {
        $this->_id = $service->id;
        $this->title = $service->title;
        $this->description = $service->description;
        $this->price = $service->price;
    }

    public function submit()
    {
        $this->validate($this->getValidationRules());

        $service = Service::find($this->_id);

        $service->title = $this->title;
        $service->description = $this->description;
        $service->price = $this->price;

        $service->save();

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/services')->with('update', 'ok');
    }


    public function render()
    {
        return view('livewire.edit-service-form');
    }
}
