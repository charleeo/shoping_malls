<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ServiceAd;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        view()->composer('*', function($view)
    {
        
        $dropdown1 = [
            ['path'=>'/shops/create','text'=>'create/Edit shop'],
            ['path'=>'/shops/create-photo','text'=>'upload logo'],
        ];

        $dropdown2 = [
            ['path'=>'/ads','text'=>'Create'],
            ['path'=>'/products/manage','text'=>'view/Edit'],
            ['path'=>'/ads/manage','text'=>'view all'],
        ];

        $menus = [
            ['path'=>'/shops/create','text'=>'get started'],
            ['path'=>'/products/create','text'=>'post an ad'],
            ['path'=>'/businesses','text'=>'shops'],
            ['path'=>'/about','text'=>'about-us'],
            ['path'=>'/products','text'=>'Products'],
            ['path'=>'/services','text'=>'services'],
        ];

        $deliveryStatus =["pay on delivery","payment before delivery","Either of the two" ];

        if (Auth::check()) {
            $menus[]=['path'=>'/home','text'=>'dashboard'];
        }else {
            $menus[]=['path'=>'/register','text'=>'register'];
            $menus[]= ['path'=>'/login','text'=>'login'];
        }
        $path= $_SERVER['REQUEST_URI'];
         $view->with([
             'dropdown1'=>$dropdown1,
             'path'=>$path,
             'menus'=>$menus,
             'dropdown2'=>$dropdown2,
             'deliveryStatus'=>$deliveryStatus,
             ] );
    });
        //  view()->share(['dropdown1'=>$dropdown1,'path'=>$path,'menus'=>$menus] );
    }
}
