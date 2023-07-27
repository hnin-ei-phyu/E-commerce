<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginWithFacebookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category',CategoryController::class);
Route::resource('products',ProductController::class);
Route::post('products/search',[ProductController::class,'search'])->name('products.sreach');

//Frontend Route
Route::get('/',[FrontendController::class,'welcome'])->name('front.welcome');
Route::get('/details/{id}',[FrontendController::class,'show'])->name('front.show');
Route::post('/front-search',[FrontendController::class,'search'])->name('front.sreach');

//Shopping Cart
Route::get('/add-to-cart/{id}',[CartController::class,'add'])->name('cart.add');
Route::get('/remore-cart/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::get('/increase-cart/{id}',[CartController::class,'increase'])->name('cart.increase');
Route::get('/decrease-cart/{id}',[CartController::class,'decrease'])->name('cart.decrease');
Route::get('/cartlist',[CartController::class,'list'])->name('cart.list');

//Order
Route::resource('orders',OrderController::class);
Route::post('/order-search',[OrderController::class,'search'])->name('orders.sreach');
Route::post('ordersprocess/{id}',[OrderController::class,'processed'])->name('orders.processed');
Route::post('ordersshipped/{id}',[OrderController::class,'shipped'])->name('orders.shipped');
Route::post('ordersenroute/{id}',[OrderController::class,'enroute'])->name('orders.enroute');
Route::post('ordersarrived/{id}',[OrderController::class,'arrived'])->name('orders.arrived');
//order track
Route::get('ordertrack/',[OrderController::class,'ordertrack'])->name('orders.ordertrack');
Route::post('ordertracking',[OrderController::class,'tracking'])->name('orders.tracking');

//Place Order
Route::get('ordersuccess',[OrderController::class,'success'])->name('orders.success');


//Admin Route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/',[AdminController::class,'index'])->name('admin.index');
});


//Send Email PDF
Route::get('send-email-pdf/{id}',[PDFController::class,'index'])->name('email.send');
Auth::routes();

//Home/Account Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Route
Route::resource('users',UserController::class);
Route::post('/user-search',[UserController::class,'search'])->name('users.sreach');

//Social Media Login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Facebook Login Route
Route::get('/redirect', [LoginWithFacebookController::class, 'redirectFacebook'])->name('facebook.login');
Route::get('/callback', [LoginWithFacebookController::class, 'facebookCallback']);

