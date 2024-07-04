<?php


use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard')->lazy();
});


