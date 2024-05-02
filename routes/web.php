<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;

//Usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('users.update');
Route::get('/users/{id}/passwordEdit', [UserController::class, 'passwordEdit'])->name('users.passwordEdit');
Route::put('/users/passwordEdit/{id}', [UserController::class, 'updatePassword'])->name('users.passwordUpdate');
Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('users.destroy');
