<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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



Route::get('register', [AuthController::class, 'formRegister'])->  name('form_register');
Route::post('register', [AuthController::class,'register'])->name('register');

// Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'formVerifyEmail'])->name('form_verifyEmail');
// Route::post('verifyEmail', [AuthController::class,'verifyEmail'])->name('verifyEmail');


Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'formVerifyEmail'])->name('form_verify_email');
Route::post('/verifyEmail/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = \App\Models\User::find($id);

    if ($user && hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        $user->markEmailAsVerified();
        event(new \Illuminate\Auth\Events\Verified($user));
        return redirect('form-login'); // or wherever you want to redirect after verification
    }

    return abort(404); // or handle invalid verification link as needed
})->name('verification.verify');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('form_login');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');





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
Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('guest');;

//login decentralization
Route::get('/client-home-page',[AuthController::class,'dashboard_client'])->name('client_page');
//logout
Route::group(['middleware' => 'login'], function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//login with google
Route::get('auth/google',[LoginGoogleController::class,'redirectToGoogle'])->name('login-with-google');
Route::get('auth/google/callback',[LoginGoogleController::class,'handleGoogleCallback']);


