<?php

use App\Livewire\Web\Index;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::as('web.')->group(function ()    {
    Route::get('/', Index::class)->name('index');
});


