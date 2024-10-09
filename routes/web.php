<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Search;
use App\Livewire\Greeter;
use App\Livewire\ShowArticle;

Route::get('/', function () {
    return view('welcome');
});


// Full Page Component
Route::get('/search', Search::class);
Route::get('/greeting', Greeter::class);
// Article
Route::get('/articles/{article}', ShowArticle::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
