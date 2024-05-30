<?php

require __DIR__ . '/auth.php';
require __DIR__ . '/users/web.php';

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Global\GlobalController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [GlobalController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/welcome', [GlobalController::class, 'index'])
        ->name('dashboard');

    Route::get('/index', [GlobalController::class, 'index'])
        ->name('dashboard');
});
