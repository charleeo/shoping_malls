<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UpdateCartController extends Controller
{
    public function updateCart(Request $request)
    {
        $prod_id = $request->product_id;
        $quantity = $request->quantity;
        $grandTotal =0;
        /*Check to make sure people don't order for more than what is in stock*/
        $availableQuantities = Product::find($prod_id);
        $availableQuantities= $availableQuantities->quantity;
    
        if($quantity > $availableQuantities){
            return response()->json(['status'=>"Total QTY is '$availableQuantities'. Reduce by 1"]);
        }
         
        if(Cookie::get('shopping_cart'))
        {
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
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        
                        // get the total price of all items in the cart
                       $grandTotal= self::getTheSumOfItemInACart($cart_data);
                        
                        // get the value of the item being updated
                        $itemTotalValue = number_format($cart_data[$keys]['item_price'] * $cart_data[$keys]
                        ['item_quantity'],2);
                    
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated',
                            'itemTotalValue'=>$itemTotalValue,
                            'cartGrandTotal' => number_format($grandTotal,2),
                        ]);
                    }
                }
            }
        }
    }
    public static function  getTheSumOfItemInACart($cart_data){
        $grandTotal=0;
        $price = array_column($cart_data,'item_price');
        $quantities = array_column($cart_data,'item_quantity');
        $arrayMap = array_map(function($x,$y){
        return $x *$y;
        },$quantities,$price);
        $grandTotal += array_sum($arrayMap);
        return $grandTotal;
    }

    /*Check to make sure people don't order for more than what is in stock*/
    public static function checkQuantities(Request $request){
        $prod_id= $request->product_id;
        $quantity = $request->quantity;
        $availableQuantities = Product::find($prod_id);
        $availableQuantities= $availableQuantities->quantity;
        if($quantity > $availableQuantities){
            return response()->json(['status'=>"Available QTY is '$availableQuantities'"]);
        }else{
            return response()->json(['status'=>"OK"]);
        }
    }
}
