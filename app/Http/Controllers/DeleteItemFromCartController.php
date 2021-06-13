<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DeleteItemFromCartController extends Controller
{
    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    $grandTotal = UpdateCartController::getTheSumOfItemInACart($cart_data);
                    return response()->json([
                        'status'=>'Item Removed from Cart',
                        'cartGrandTotal'=> number_format($grandTotal,2)
                    ]);
                }
            }
        }
    }

    public function clearCart(){
        Cookie::queue(Cookie::forget('shopping_cart'));
        return redirect()->back()->with('success','Your cart is now empty');
    }
}
