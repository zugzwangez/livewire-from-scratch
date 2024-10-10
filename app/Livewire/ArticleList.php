<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manage Articles')]

class ArticleList extends AdminComponent
{
    use WithPagination;

    #[Session(key: 'published')]
    public $showOnlyPublished = false;
    
    public function delete(Article $article)
    {
        $article->delete();
    }
    
    // Refactor in one method
    /* public function showAll()
    {
        $this->showOnlyPublished = false;
        // reset the url parameter page
        $this->resetPage();
    }
    
    public function showPublished()
    {
        $this->showOnlyPublished = true;
        // reset the url parameter page
        $this->resetPage();
    } */

    public function showAllArticles(bool $all)
    {
        $all == true ? $this->showOnlyPublished = false : $this->showOnlyPublished = true;
        $this->resetPage();
    }

    public function render()
    {

        $query = Article::query();

        if($this->showOnlyPublished)
        {
            $query->where('published', 1);
        }

        return view('livewire.article-list', [
            'articles' => $query->paginate(20)
        ]);
    }
}
