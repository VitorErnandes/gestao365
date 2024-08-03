<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Global\GlobalController;

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    require __DIR__ . '/users/web.php';
    require __DIR__ . '/products/web.php';
    require __DIR__ . '/customers/web.php';

    Route::get('/dashboard', [GlobalController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/welcome', [GlobalController::class, 'index'])
        ->name('welcome');

    Route::get('/index', [GlobalController::class, 'index'])
        ->name('index');
});
