<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'create'])->name('login');
Route::post('/', [SessionController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [SessionController::class, 'index']);
    Route::get('/admin/profile', [SessionController::class, 'show']);
    Route::patch('/admin/profile', [SessionController::class, 'update']);
    Route::post('/admin', [SessionController::class, 'destroy']);

    Route::middleware(EnsureIsAdmin::class)->group(function () {
        Route::get('/admin/users', [UserController::class, 'index']);
        Route::get('/admin/users/{user}', [UserController::class, 'show']);
        Route::post('/admin/users', [UserController::class, 'store']);
        Route::patch('/admin/users/{user}', [UserController::class, 'update']);
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy']);
    });

    // Tool
    Route::get('/admin/tools', [ToolController::class, 'index']);
    Route::post('/admin/tools', [ToolController::class, 'store']);
    Route::get('/admin/tools/{tool}', [ToolController::class, 'show']);
    Route::patch('/admin/tools/{tool}', [ToolController::class, 'update'])->middleware(EnsureIsAdmin::class);
    Route::delete('/admin/tools/{tool}', [ToolController::class, 'destroy'])->middleware(EnsureIsAdmin::class);

    // Category
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::post('/admin/categories', [CategoryController::class, 'store']);
    Route::get('/admin/categories/{category}', [CategoryController::class, 'show']);
    Route::patch('/admin/categories/{category}', [CategoryController::class, 'update'])->middleware(EnsureIsAdmin::class);

    // Tag
    Route::get('/admin/tags', [TagController::class, 'index']);
    Route::get('/admin/tags/{tag}', [TagController::class, 'show']);    
});