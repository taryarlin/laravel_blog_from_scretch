<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware('guest')->group(function () {
    # Register
    Route::get('register', [RegisterController::class, 'register'])->name('get.register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

    # Login
    Route::get('login', [LoginController::class, 'showLogin'])->name('get.login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');

    # Forgot Password
    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password.index');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('forgot-password.send-email');

    # Reset Password
    Route::get('reset-password', [ResetPasswordController::class, 'index'])->name('reset-password.index');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password.reset');
});

Route::middleware('auth', 'verified')->group(function () {
    # Post Detail
    Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    # Comment
    Route::post('posts/{post:slug}/comment', [CommentController::class, 'store'])->name('comment.store');

    # Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('post.logout');
});

Route::prefix('email/verify')->group(function () {
    Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('notice', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    Route::get('sent', [EmailVerificationController::class, 'sent'])->name('verification.sent');
    Route::get('success', [EmailVerificationController::class, 'success'])->name('verification.success');
});
