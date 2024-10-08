<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\Validate;

class Greeter extends Component
{
    // We can only use public properties in the View
    
    // Validate using Livewire, validate but not stop the execution
    #[Validate('required|min:2')]
    public $name = '';
    public $greeting = '';
    public $greetingMessage = '';

    public function changeGreeting()
    {
        // To initialize, same as use $this->greetingMessage = ''
        $this->reset('greetingMessage');

        // validate using method rules
        $this->validate();

        // One way to validate, specify the rules direct in the validate method
        /* $this->validate([
            'name' => 'required|min:2',
        ]); */

        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }

    // Another way to validate
    /* public function rules() {
        return [
            'name' => 'required|min:2',
        ];
    } */

    public function render()
    {
        return view('livewire.greeter');
    }
}
