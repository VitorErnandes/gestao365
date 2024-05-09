<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Permission\PermissionController;

//Permissions
Route::resource('permissions', PermissionController::class);
Route::delete('/permissions/{id}', [PermissionController::class, 'destroyPermission'])->name('permissions.destroy');

//Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('users.update');
Route::get('/users/{id}/editPassword', [UserController::class, 'editPassword'])->name('users.editPassword');
Route::put('/users/editPassword/{id}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('users.destroy');
