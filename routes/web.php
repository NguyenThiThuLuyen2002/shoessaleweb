<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// admin
Route::prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index']);

    // Category
    Route::prefix('categories')->group(function () {
        Route::post('list', [CategoryController::class, 'store']);
        Route::get('list', [CategoryController::class, 'index']);
    });

    // Product
    Route::prefix('products')->group(function () {
        Route::get('create', [ProductController::class, 'create']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('detail/{id}', [ProductController::class, 'show']);
    });
});
