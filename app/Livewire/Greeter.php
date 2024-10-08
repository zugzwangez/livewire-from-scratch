<?php

namespace App\Livewire;

use App\Models\Greeting;
use Livewire\Component;

use Livewire\Attributes\Validate;

class Greeter extends Component
{
    // We can only use public properties in the View
    
    // Validate using Livewire, validate but not stop the execution
    #[Validate('required|min:2')]
    public $name = '';
    public $greeting = '';
    public $greetings = [];
    public $greetingMessage = '';


    public function mount()
    {
        // Load greetings from the DB Table
        $this->greetings = Greeting::all();
    }

    // Execute anytime there is an update in the component, e.g: type a name in an input
    public function updated($property, $value)
    {
        if ($property == 'name')
        {
            $this->name = strtolower($value);
        }
    }

    // To check a particular property, use updatedPropertyName
    public function updatedGreeting($value)
    {
        $this->greeting = strtoupper($value);
    }

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
