<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\CustomerController;

Route::resource('customers', CustomerController::class);
