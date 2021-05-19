<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function createShop(){
         $categories = ['electronic', 'baby wears', 'phones', 'adult wears', 'household','computers','phone accessaries'];
        return view('shops.create_shops',compact('categories'));
    }
}
