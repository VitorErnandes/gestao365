<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductsGroupController;

Route::resource('products', ProductController::class);

Route::resource('products-group', ProductsGroupController::class);
