<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Article;

class ArticleForm extends Form
{
    public ?Article $article;
    
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public $published = false;
    public $notifications = [];
    public $allowNotifications = false;

    public function setArticle(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        // if its null we assign an empty array
        $this->notifications = $article->notifications ?? [];
        // if we have notification in the array must be true otherwise false
        $this->allowNotifications = count($this->notifications) > 0;

        $this->article = $article;
    }
    
    public function store()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        Article::create($this->only(['title','content','published','notifications']));

    }

    public function update()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        $this->article->update(
            $this->only(['title','content','published','notifications'])
        );

    }
}
