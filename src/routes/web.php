<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

Route::get("/", function () {
    return view("welcome");
});

// User routes
Route::post('/api/users', [UserController::class, 'store']);
Route::delete('/api/users/{id}', [UserController::class, 'destroy']);
Route::put('/api/users/{id}', [UserController::class, 'update']);
Route::get('/api/users', [UserController::class, 'index']);
Route::get('/api/users/{id}', [UserController::class, 'show']);

// Product routes
Route::post('/api/products', [ProductController::class, 'store']);
Route::delete('/api/products/{id}', [ProductController::class, 'destroy']);
Route::put('/api/products/{id}', [ProductController::class, 'update']);
Route::get('/api/products', [ProductController::class, 'index']);
Route::get('/api/products/{id}', [ProductController::class, 'show']);
