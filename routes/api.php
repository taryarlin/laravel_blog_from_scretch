<?php


use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts', [PostController::class, 'index']);
});


Route::post('login', [LoginController::class, 'postLogin']);
