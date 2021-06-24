<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderSummaryController extends Controller
{
    public function orderDetailsBeforePayment(){
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
             
        }else{
            $cart_data = [];
        }
        
    
        return view('orders.order_summary',compact('cart_data'));
    }
}
