<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Access\AccessController;

//Usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('users.update');
Route::get('/users/{id}/editPassword', [UserController::class, 'editPassword'])->name('users.editPassword');
Route::put('/users/editPassword/{id}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('users.destroy');


//Acesso
Route::get('/accessManager', [AccessController::class, 'permissions'])->name('access.permissions'); //->middleware('auth'); use para redrecionar para login
Route::post('/accessManager/assignPermission', 'AccessManagerController@assignPermission')->name('access.assign');
Route::create('/accessManager/create', 'AccessManagerController@showAssignPermissionForm')->name('access');
