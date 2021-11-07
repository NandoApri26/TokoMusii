<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// panggil index
// Route::get('', function () {
//     return view('index');
// });

// Route::get('/category', [CategoryController::class, 'index']);
// Route::get('/category/create',[CategoryController::class, 'create']);
// Route::post('/category', [CategoryController::class, 'store']);
// Route::delete('/category/{category}',[CategoryController::class, 'destroy']);
// Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
// Route::get('/category/{category}', [CategoryController::class, 'update']);
Route::resource('category', CategoryController::class);

// product
// Route::resource('category', CategoryController::class);
Route::resource('product', Productcontroller::class);

// Courier
Route::resource('courier', CourierController::class);

// Landing Page
Route::resource('home', LandingController::class);