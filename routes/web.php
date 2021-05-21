<?php

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

Route::post('upload', [ UploadController::class, 'uploadFile' ])->name('uploadFile');
Route::prefix('shops')->group(function () {
    Route::get('/create',[ShopController::class,'createShop']);
    Route::post('/create','ShopController@storeShop')->name('shops');
    Route::post('/profile','ShopController@uploadBusinessImage')->name('business-profile-photo');
});
Route::resource('products', 'ProductController');