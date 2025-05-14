<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'authenticate']);

Route::apiResource('/products', ProductController::class)
    ->middleware(['auth:sanctum']);
