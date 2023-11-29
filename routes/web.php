<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginGoogleController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\HomeController;


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
//home
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('client.home');
    Route::get('product-detail/{id}', 'detail')->name('client.products.detail');
});

//checkout
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout', 'index');
    Route::post('/vnpay', 'vnpay_payment');
    Route::get('/vnpay-callback', 'vnpay_callback')->name('vnpay.callback');

});


// admin
Route::prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('admin-home-page'); //Ng set name for login --

    // Category
    Route::prefix('categories')->group(function () {
        Route::post('list', [CategoryController::class, 'store']);
        Route::get('list', [CategoryController::class, 'index']);
    });

    // Product
    Route::prefix('products')->group(function () {
        Route::get('create', [ProductController::class, 'create']);
        Route::post('create', [ProductController::class, 'store']);
        Route::post('detail/{id}', [ProductController::class, 'storeDetail']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('detail/{id}', [ProductController::class, 'show']);
        Route::get('update/{id}', [ProductController::class, 'edit']);
        Route::post('update/{id}', [ProductController::class, 'update']);
        Route::delete('destroy/{id}', [ProductController::class, 'destroy']);
        Route::delete('/delete-details/{id}', [ProductController::class, 'destroyDetail']);
        Route::delete('/delete-all-details/{id}', [ProductController::class, 'destroyAllDetail']);
        
    });
});

// login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//login decentralization
Route::get('/client-home-page', [AuthController::class, 'dashboard_client'])->name('client_page');
// // //logout
// Route::group(['middleware' => 'login'], function () {
//     Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// });

// //login with google
// Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-with-google');
// Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
//login google
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

