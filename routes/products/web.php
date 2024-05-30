<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductsGroupController;

Route::prefix('products')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::prefix('product-groups')->group(function () {
    Route::resource('products-group', ProductsGroupController::class);
});
