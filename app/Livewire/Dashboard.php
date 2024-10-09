<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Admin')]

class Dashboard extends AdminComponent
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
