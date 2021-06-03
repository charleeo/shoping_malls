<?php

namespace App\Providers;

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
        
        $menus = [
            ['path'=>'/shops/create','text'=>'get started'],
            ['path'=>'/products/create','text'=>'post an ad'],
            ['path'=>'/businesses','text'=>'shops'],
            ['path'=>'/products','text'=>'Products'],
            ['path'=>'/about','text'=>'about-us'],
        ];

        if (Auth::check()) {
            $menus[]=['path'=>'/home','text'=>Auth::user()->name];
        }else {
            $menus[]=['path'=>'/register','text'=>'register'];
            $menus[]= ['path'=>'/login','text'=>'login'];
        }
        $path= $_SERVER['REQUEST_URI'];
         $view->with(['dropdown1'=>$dropdown1,'path'=>$path,'menus'=>$menus] );
    });
        //  view()->share(['dropdown1'=>$dropdown1,'path'=>$path,'menus'=>$menus] );
    }
}
