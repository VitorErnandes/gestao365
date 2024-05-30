<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:super-admin']], function () {
        //Permissions
        Route::resource('permissions', PermissionController::class);

        // Roles
        Route::resource('roles', RoleController::class);
        Route::get('/roles/{id}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
        Route::put('/roles/{id}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

        //Users
        Route::resource('users', UserController::class);
    });

    Route::get('/users/{id}/editPassword', [UserController::class, 'editPassword'])->name('users.editPassword')->middleware('permission:Alterar senha usuário');
    Route::put('/users/editPassword/{id}', [UserController::class, 'updatePassword'])->name('users.updatePassword')->middleware('permission:Alterar senha usuário');
});
