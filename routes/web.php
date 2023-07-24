<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index']);
Route::get('/setup', [AppController::class, 'setup']);
Route::get('/settings', [AppController::class, 'settings']);
