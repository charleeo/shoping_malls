<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\BusinessDomainController;
use App\Http\Controllers\DeleteItemFromCartController;
use App\Http\Controllers\DisplayProductsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UpdateCartController;
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

Route::get('/', [HomepageController::class,'index']);

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
    Route::get('/all-created',[ProductController::class,'index'])->name('products.all-created');
    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');

    Route::get('/',[DisplayProductsController::class,'index'])->name('products.index');

    Route::get('/{name}/{product}',[DisplayProductsController::class,'show'])->name('products.show');//for all users

    Route::delete('/delete/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

Route::get('/create-account',[RegisterController::class,'showRegisterForm']);

Route::post('/save-users',[RegisterController::class,'storeUsers']);

    Route::get('/businesses',[BusinessDomainController::class,'index'])->name('businesses');

// Business or shops details

Route::get('/about',[AboutusController::class,'aboutUs'])->name('about');

Route::prefix('cart')->group(function(){
    Route::get('/',[AddToCartController::class,'index']);//to display cart data
    Route::post('/add-to-cart', [AddToCartController::class,'addToCart']);
    Route::get('/load-data',[AddToCartController::class,'loadCartData']);
    Route::post('/update-cart',[UpdateCartController::class,'updateCart']);
    Route::delete('/delete',[DeleteItemFromCartController::class,'deletefromcart']);
    Route::get('/clear',[DeleteItemFromCartController::class,'clearCart']);
    Route::post('/check-quantities',[UpdateCartController::class,'checkQuantities']);
});

Route::prefix('{details}')->group(function(){
    Route::get('/',[BusinessDomainController::class,'show'])->name('home-page');
    // Route::get('/',[BusinessDomainController::class,'index'])->name('products.index');
    // Route::post('/store',[BusinessDomainController::class,'store'])->name('products.store');
    // Route::get('/show/{product}',[BusinessDomainController::class,'show'])->name('products.show');
    // Route::delete('/delete/{product}',[BusinessDomainController::class,'destroy'])->name('products.destroy');
});

// Route::domain('{domain}.'.env('APP_DOMAIN'))->group(function(){
//     Route::get('/business-profile',[BusinessDomainController::class,'show'])->name('home-page');
// });


