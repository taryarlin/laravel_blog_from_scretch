<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware('guest')->group(function() {
    # Register
    Route::get('register', [RegisterController::class, 'register'])->name('get.register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

    # Login
    Route::get('login', [LoginController::class, 'showLogin'])->name('get.login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');
});

Route::middleware('auth', 'verified')->group(function() {
    # Post Detail
    Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    # Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('post.logout');
});

Route::prefix('email/verify')->group(function() {
    Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('notice', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    Route::get('sent', [EmailVerificationController::class, 'sent'])->name('verification.sent');
    Route::get('success', [EmailVerificationController::class, 'success'])->name('verification.success');
});
