<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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


// pembungkus
Route::group(['middleware'=>['auth','admin']], function(){
// Route::group(['midleware'=>'auth'], function(){
    Route::resource('category', CategoryController::class);
    // Cart
    Route::resource('cart', CartController::class);
    // product
    // Route::resource('category', CategoryController::class);
    Route::resource('product', Productcontroller::class);
    // Courier
    Route::resource('courier', CourierController::class);
    // Payment method
    Route::resource('paymentmethod', PaymentMethodController::class);
});


// Landing Page
Route::resource('home', LandingController::class);
// Keranjang

Route::group(['middleware'=>['auth_user','user']], function(){
// "/keranjang = url, [LandingController=cotroller], "Keranjang = fungsi
Route::get('/keranjang',[LandingController::class, 'keranjang']);
Route::post('/keranjang',[LandingController::class, 'keranjang_store']);
});
// Login
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_store']);
//  ROute Register
Route::get('/register',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'register_store']);

// Logout
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/logout_user',[UserController::class, 'logout']);


// Halaman User
Route::get('/login_user', [UserController::class, 'login']);
Route::post('/login_user', [UserController::class, 'login_store']);
Route::get('/register_user', [UserController::class, 'register']);
Route::post('/register_user', [UserController::class, 'register_store']);