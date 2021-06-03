<?php

use App\Http\Controllers\BusinessDomainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/shops/create','ShopController@createShop');
// Creating shops
Route::prefix('shops')->group(function () {
    Route::get('/create',[ShopController::class,'createBusiness']);
    Route::post('/create',[ShopController::class,'storeBusiness'])->name('shops');
    Route::post('/profile',[ShopController::class,'uploadBusinessImage'])->name('business-profile-photo');
    Route::get('/create-photo',[ShopController::class,'createProfilePhoto'])->name('shops.image');
});

Route::prefix('products')->group(function(){
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/show/{product}',[ProductController::class,'show'])->name('products.show');
    Route::delete('/delete/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

Route::get('/create-account',[RegisterController::class,'showRegisterForm']);

Route::post('/save-users',[RegisterController::class,'storeUsers']);

    Route::get('/businesses',[BusinessDomainController::class,'index'])->name('businesses');

// Business or shops details

Route::prefix('{details}')->group(function(){
    // Route::get('/',[BusinessDomainController::class,'show'])->name('home-page');
    // Route::get('/',[BusinessDomainController::class,'index'])->name('products.index');
    // Route::post('/store',[BusinessDomainController::class,'store'])->name('products.store');
    // Route::get('/show/{product}',[BusinessDomainController::class,'show'])->name('products.show');
    // Route::delete('/delete/{product}',[BusinessDomainController::class,'destroy'])->name('products.destroy');
});

// Route::domain('{domain}.'.env('APP_DOMAIN'))->group(function(){
//     Route::get('/business-profile',[BusinessDomainController::class,'show'])->name('home-page');
// });


Route::get('/phpinfo',[ProductController::class,'info']);