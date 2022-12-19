<?php

namespace App\Http\Livewire;

use App\Models\Beautician;
use Livewire\Component;

class EditBeauticianForm extends Component
{
    public $_id;
    public $firstname;
    public $lastname;
    public $description;

    private function getValidationRules() {
        return [
            'firstname' => ['required', 'min:3', 'max:45'],
            'lastname' => ['required', 'min:3', 'max:75'],
            'description' => ['required', 'max:255'],
        ];
    }

    public function mount($beautician) {
        $this->_id = $beautician->id;
        $this->firstname = $beautician->firstname;
        $this->lastname = $beautician->lastname;
        $this->description = $beautician->description;
    }

    public function submit()
    {
        $this->validate($this->getValidationRules());

        $beautician = Beautician::find($this->_id);

        $beautician->firstname = $this->firstname;
        $beautician->lastname = $this->lastname;
        $beautician->description = $this->description;
        
        $beautician->save();

        $this->reset();
        $this->resetValidation();

        return redirect('/admin/beauticians')->with('update', 'ok');
    }


    public function render()
    {
        return view('livewire.edit-beautician-form');
    }
}
