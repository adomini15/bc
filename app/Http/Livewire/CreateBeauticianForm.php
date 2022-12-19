<?php

namespace App\Http\Livewire;

use App\Models\Beautician;
use Livewire\Component;

class CreateBeauticianForm extends Component
{
     // Form properties
    public $firstname;
    public $lastname;
    public $description;
 
     // Validation Rules
     private $validationRules = [
        'firstname' => ['required', 'min:3', 'max:45'],
        'lastname' => ['required', 'min:3', 'max:75'],
        'description' => ['required', 'max:255'],
     ];
 
     public function submit()
     {
         $this->validate($this->validationRules);
 
         Beautician::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'description' => $this->description,
            
         ]);
 
         $this->reset();
         $this->resetValidation();
 
         return redirect('/admin/beauticians')->with('store', 'ok');
     }
 
 
     public function render()
     {
         return view('livewire.create-beautician-form');
     }
}
