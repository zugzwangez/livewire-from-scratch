<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Livewire\Search;
use App\Livewire\Greeter;
use App\Livewire\Login;
use App\Livewire\ShowArticle;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function() {
    Auth::logout();

    return redirect()->route('home');
});

// Full Page Component
//Route::get('/search', Search::class);
Route::get('/greeting', Greeter::class);
// Article
Route::get('/articles/{article}', ShowArticle::class);


Route::middleware([
    'auth',   
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/articles', ArticleList::class)->name('dashboard.articles.index');//->lazy()
    Route::get('/dashboard/articles/create', CreateArticle::class);
    Route::get('/dashboard/articles/{article}/edit', EditArticle::class);
});
