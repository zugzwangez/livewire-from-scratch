<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;
use Livewire\Form;
use App\Models\Article;

class ArticleForm extends Form
{
    public ?Article $article;
    #[Locked]
    public int $id;
    
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public $published = false;
    public $notifications = [];
    public $allowNotifications = false;
    // upload photos
    public $photo_path = '';
    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public function setArticle(Article $article)
    {
        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        // if its null we assign an empty array
        $this->notifications = $article->notifications ?? [];
        $this->photo_path = $article->photo_path;
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

        foreach ($this->photos as $photo)
        {
            if ($photo)
            {
                $this->photo_path = $photo->storePublicly('article_photos', ['disk' => 'public']);
            }
        }

        Article::create($this->only(['title','content','published','notifications', 'photo_path']));

    }

    public function update()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        foreach ($this->photos as $photo)
        {
            if ($photo)
            {
                $this->photo_path = $photo->storePublicly('article_photos', ['disk' => 'public']);
            }
        }

       /*  if ($this->photo)
        {
            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }      */  

        $this->article->update(
            $this->only(['title','content','published','notifications', 'photo_path'])
        );

    }
}
