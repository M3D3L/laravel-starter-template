<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get("/test/{id}", function ($id) {
    return "Test number $id";
});

Route::get('/greeting', function () {
    return 'Hello World';
});

// Create, Delete, and Upgate Routes for Products
Route::post('/api/products/{name}', function($name){
    return Product::create(['name' => $name]);
});

Route::delete('/api/products/{id}', function($id){
    return Product::destroy($id);
});

Route::put('/api/products/{id}/{name}', function($id, $name){
    $product = Product::find($id);
    $product->name = $name;
    $product->save();
    return $product;
});

// Search Routes for Products
Route::get('/api/products', function(){
    return Product::all();
});

Route::get('/api/products/{id}', function($id){
    return Product::find($id);
});