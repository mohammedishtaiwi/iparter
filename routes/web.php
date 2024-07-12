<?php

use App\Livewire\Web\About;
use App\Livewire\Web\Contact;
use App\Livewire\Web\Index;
use Illuminate\Support\Facades\Route;

Route::as('web.')->group(function ()    {
    Route::get('/', Index::class)->name('Home');
    Route::get('/contact', Contact::class)->name('Contact-Us');
    Route::get('/about', About::class)->name('About-Us');

});


