<?php

use App\Http\Controllers\Api\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToolController::class, 'index']);
Route::get('/{tool}', [ToolController::class, 'show']);