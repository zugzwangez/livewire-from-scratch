<?php

namespace App\Livewire;

use App\Models\Article;

use Livewire\Component;

class ShowArticle extends Component
{

    public Article $article;


   /*  // id is automatically pass from the Route
    public function mount($id)
    {
        // findOrFail -> In case the article does not exists show 404 error
        $this->article = Article::findOrFail($id);
    } */

    // using Model Binding, we can pass directly the object
    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.show-article');
    }
}
