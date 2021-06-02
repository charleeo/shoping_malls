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
        // $menus = [
        //     ['path'=>'/shops/create','text'=>'get started'],
        //     ['path'=>'/products/create','text'=>'create ads'],
        //     ['path'=>'/businesses','text'=>'shops'],
        // ];
        // if(!Auth::user()){
        //     $menus[]=['path'=>'/register','text'=>'register'];
        //    $menus[]= ['path'=>'/login','text'=>'login'];
        // }else {
        //     $menus[]=['path'=>'/home','text'=>Auth::user()->name];
        // }
        
        //  view()->share(['menus'=>$menus] );
    }
}
