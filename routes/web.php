<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Main::class)
    ->name('main');

//Route::get('/setup', \App\Livewire\App::class);

Route::get('/settings', \App\Livewire\Settings::class)
    ->name('settings');
