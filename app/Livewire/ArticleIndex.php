<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Articles')]

class ArticleIndex extends Component
{
    
    // Instead of grab the data and mount(), this will be done once, if the collection is updated we do not see it
    // Better approach pass in the render method
    /* public $articles = [];


    public function mount()
    {
        $this->articles = Article::all();
    } */

    public function render()
    {
        return view('livewire.article-index', [
            'articles' => Article::all()
        ]);
    }
}
