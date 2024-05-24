<?php

require __DIR__ . '/auth.php';

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;

Route::group(['middleware' => ['role:super-admin|Usuário']], function () {
    //Permissions
    Route::resource('permissions', PermissionController::class);
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroyPermission'])->name('permissions.destroy');

    // Roles
    Route::resource('roles', RoleController::class);
    Route::delete('/roles/{id}', [RoleController::class, 'destroyRole'])->name('roles.destroy');
    Route::get('/roles/{id}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
    Route::put('/roles/{id}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

    //Users
    Route::resource('users', UserController::class);
    Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('users.destroy');
});

Route::get('/dashboard', [App\Http\Controllers\Global\GlobalController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/welcome', [App\Http\Controllers\Global\GlobalController::class, 'index'])
    ->name('dashboard');

Route::get('/index', [App\Http\Controllers\Global\GlobalController::class, 'index'])
    ->name('dashboard');

Route::get('/users/{id}/editPassword', [UserController::class, 'editPassword'])->name('users.editPassword')->middleware('permission:Alterar senha usuário');
Route::put('/users/editPassword/{id}', [UserController::class, 'updatePassword'])->name('users.updatePassword')->middleware('permission:Alterar senha usuário');
