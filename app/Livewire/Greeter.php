<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    // We can only use public properties in the View
    public $name = 'John';

    public function changeName($newName) {
        $this->name = $newName;
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
