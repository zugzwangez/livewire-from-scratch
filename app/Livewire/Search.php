<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

#[Isolate]
class Search extends Component
{

    //#[Validate('required')]
    // as 'q' , makes the property $searchText an alias called q, in the url parameter
    // except if the text is an empty string will not be included in the url
    /* #[Url(as: 'q', except: '', history: true)] */  
    public $searchText = '';
    //public $results = [];
    public $placeholder;


   // We render the results in the render method, then we can copy the url with the parameters to replicate the search in the browser
    /*  public function updatedSearchText($value)
    {
        $this->reset('results');

        // Clear the results if there is no searchText
        $this->validate();
        
        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    } */

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText');
    }

    // same as use #[Url(as: 'q', except: '', history: true)]
    protected function queryString() {
        return [
            'searchText' => [
                'as' => 'q',
                'history' => true,
                'except' => ''
            ]
        ];
     }

    public function render()
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'LIKE', "%{$this->searchText}%")->get()
        ]);
    }
}
