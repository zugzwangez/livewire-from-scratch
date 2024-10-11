<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Component;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class CreateArticle extends AdminComponent
{
    use WithFileUploads;
    
    /* #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $content = '';
    
    public function save()
    {
        $this->validate();

        Article::create($this->all());

        $this->redirect('/dashboard/articles', navigate: true);
    } */

    // Using the form Livewire
    public ArticleForm $form;

    public function save()
    {
        $this->form->store();

        //$this->redirect('/dashboard/articles', navigate: true);
        // use name redirection
        $this->redirectRoute('dashboard.articles.index', navigate: true);

    }
    
    public function render()
    {
        return view('livewire.create-article');
    }
}
