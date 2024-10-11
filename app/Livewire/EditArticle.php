<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;

use Livewire\Attributes\Validate;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditArticle extends AdminComponent
{
   use WithFileUploads;
   
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

    public function downloadPhoto()
    {
        return response()->download(
            Storage::disk('public')->path($this->form->photo_path),
            'article_photo.png'
        );
    }

    public function save()
    {
        $this->form->update();

        // using a session to show a flash message
        session()->flash('status', 'Article ' . $this->form->title . ' successfully updated.');

        //$this->redirect('/dashboard/articles', navigate: true);
        // redirecting to a full page component using the class name
        $this->redirect(ArticleList::class, navigate: true);
    }
    
    public function render()
    {
        return view('livewire.edit-article');
    }
}
