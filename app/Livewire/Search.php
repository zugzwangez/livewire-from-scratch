<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;

class Search extends Component
{

    #[Validate('required')]
    public $searchText = '';
    public $results = [];
    public $placeholder;


    public function updatedSearchText($value)
    {
        $this->reset('results');

        // Clear the results if there is no searchText
        $this->validate();
        
        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('results','searchText');
    }


    public function render()
    {
        return view('livewire.search');
    }
}
