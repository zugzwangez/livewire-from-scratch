<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    // We can only use public properties in the View
    public $name = 'John';

    public function render()
    {
        return view('livewire.greeter');
    }
}
