<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class SearchResults extends Component
{

    #[Reactive]
    public $results = [];

    #[Reactive]    
    public $show = [];



    // will fire an event that will be listened in the parent Search Component
    // But better fire the event directly in the button
   /*  public function clear()
    {
        $this->dispatch('search:clear-results');
    } */

    public function render()
    {
        return view('livewire.search-results');
    }
}
