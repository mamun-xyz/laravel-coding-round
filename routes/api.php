<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;

Route::post('/register', [AuthController::class, 'register']);

Route::prefix('posts')->group(function () {
    Route::post('/', [PostController::class, 'store']);
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{id}', [PostController::class, 'show']);
});

Route::prefix('tasks')->group(function () {
    Route::post('/', [TaskController::class, 'store']);
    Route::patch('/{id}', [TaskController::class, 'update']);
    Route::get('/pending', [TaskController::class, 'pending']);
});
