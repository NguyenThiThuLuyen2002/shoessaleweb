<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginGoogleController;


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
Route::get('/', function () {
    return view('client/home/index');
});


// admin
Route::prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('admin-home-page'); //Ng set name for login --

    // Category
    Route::prefix('categories')->group(function () {
        Route::post('list', [CategoryController::class, 'store']);
        Route::get('list', [CategoryController::class, 'index']);
    });
});

// login

Route::get('form-login', [AuthController::class, 'formLogin'])->name('form_login');
Route::post('login', [AuthController::class, 'login'])->name('login');

//login decentralization
Route::get('/client-home-page',[AuthController::class,'dashboard_client'])->name('client_page');
//logout
Route::group(['middleware' => 'login'], function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//login with google
Route::get('auth/google',[LoginGoogleController::class,'redirectToGoogle'])->name('login-with-google');
Route::get('auth/google/callback',[LoginGoogleController::class,'handleGoogleCallback']);


