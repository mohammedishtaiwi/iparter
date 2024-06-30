<?php

use App\Livewire\Web\Index;
use Illuminate\Support\Facades\Route;

Route::as('web.')->group(function ()    {
    Route::get('/', index::class)->name('index');
    // Route::get('/page/{path}', Page::class)->name('page');
    // Route::get('/contact-us', ContactUs::class)->name('contact-us');
    // Route::get('/about-us', AboutUs::class)->name('about-us');
    // Route::get('/services', Service::class)->name('services');
    // Route::get('/articles', Articles::class)->name('articles');
    // Route::get('/articles/{slug}', Article::class)->name('articles.show');
});


