<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\ProductController;
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
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('client.home');
    Route::get('product-detail/{id}', 'detail')->name('client.products.detail');
});

// //checkout
// Route::controller(CheckoutController::class)->group(function () {
//     Route::get('/checkout', 'index')->middleware('checkCheckOut');
//     Route::post('/vnpay', 'vnpay_payment');
//     Route::get('/vnpay-callback', 'vnpay_callback');
//     Route::get('/checkout-success/{vnp_TxnRef}', 'checkout_success')->name('checkout-success')->middleware('checkSuccessfulPayment');
//     Route::get('/export-pdf/{vnp_TxnRef}', 'exportPdf');
// });

// admin
Route::prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('admin-home-page'); //Ng set name for login --
});

Route::get('register', [AuthController::class, 'formRegister'])->name('form_register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('forgot.password.submit');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');



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
        return redirect('login'); // or wherever you want to redirect after verification
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

//Client
Route::middleware(['ClientMiddleware'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('client.home');
    //checkout
    Route::middleware(['checkUserAuthentication'])->group(function () {
        Route::controller(CheckoutController::class)->group(function () {
            Route::get('/checkout', 'index')->middleware('checkCheckOut');
            Route::post('/vnpay', 'vnpay_payment');
            Route::get('/vnpay-callback', 'vnpay_callback');
            Route::get('/checkout-success/{vnp_TxnRef}', 'checkout_success')->name('checkout-success')->middleware('checkSuccessfulPayment');
            Route::get('/export-pdf/{vnp_TxnRef}', 'exportPdf');
        });
    });
});



// admin
Route::middleware(['AdminMiddleware'])->group(function () {
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
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
