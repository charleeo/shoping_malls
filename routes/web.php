<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\BusinessDomainController;
use App\Http\Controllers\DeleteItemFromCartController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\DisplayProductsController;
use App\Http\Controllers\DisplayServicesController;
use App\Http\Controllers\GeneralPurposeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceAdsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UpdateCartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

    Route::get('/{product}/delete',[DeleteProductController::class,'deleteProduct'])->name('destroy');

    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');

    Route::post('/store',[ProductController::class,'store'])->name('products.store');

    Route::get('/',[DisplayProductsController::class,'index'])->name('products.index');

    Route::get('/{product}/{name}',[DisplayProductsController::class,'show'])->name('products.show');//for all users
});


Route::prefix('services')->group(function(){
   
    Route::get('/{service}/delete',[DeleteProductController::class,'deleteService'])->name('services.delete');

    Route::post('/store',[ServiceAdsController::class,'store'])->name('services.store');
    Route::get('/create',[ServiceAdsController::class,'create'])->name('services.create');
    Route::get('/all-created',[ServiceAdsController::class,'index'])->name('services.all-created');
    Route::get('/{id}/edit', [ServiceAdsController::class,'edit'])->name('services.edit');
    Route::get('/{service}/{name}/',[DisplayServicesController::class,'show'])->name('services.show');//for all users
    Route::get('/',[DisplayServicesController::class,'index'])->name('services.index');
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

Route::prefix('ads')->group(function () {
    Route::get('/',[GeneralPurposeController::class,'createAds'] );
    Route::get('manage',[GeneralPurposeController::class,'showServicesAndProducts']);
    Route::post('/delete_form_image',[GeneralPurposeController::class,'delete_form_image']);
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


