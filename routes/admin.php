<?php


use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Dashboard::getRouteName(panel: 'admin'));
});


