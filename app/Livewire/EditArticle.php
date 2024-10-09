<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;

use Livewire\Attributes\Validate;
use App\Models\Article;

class EditArticle extends AdminComponent
{
    // article can be nullable
   /*  public ?Article $article;
    
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';

    public function mount(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;

        $this->article = $article;
    }
    
    public function save()
    {
        $this->validate();

        $this->article->update(
            $this->only(['title','content'])
        );

        $this->redirect('/dashboard/articles', navigate: true);
    } */

    // using livewire form to refactor the code as in create article
    public ArticleForm $form;
    
    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function save()
    {
        $this->form->update();

        $this->redirect('/dashboard/articles', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.edit-article');
    }
}
