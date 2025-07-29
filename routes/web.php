<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'posts');

//Posts Routes
Route::resource('posts', PostController::class);

//User Posts Route
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

//Routes for Authenticated Users
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->middleware('verified')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    //Email Verification Notice route
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    //Email Verification Handler Route
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');

    //Resending the Verification Email Route
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});

//Routes for Guest Users
Route::middleware('guest')->group(function (){
    Route::view('/register','auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login','auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    //Reset Password Routes
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});



