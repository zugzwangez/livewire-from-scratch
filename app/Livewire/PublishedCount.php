<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class PublishedCount extends Component
{
    public $count = 0;
    public $placeholderText = '';

    public function mount()
    {
        // to check lazy loading
        sleep(1);
        $this->count = Article::where('published', 1)->count();
    }

    public function placeholder()
    {
        return view('livewire.lazy-loading',[
            'message' => $this->placeholderText
        ]);
    }

    public function render()
    {
        return view('livewire.published-count');
    }
}
