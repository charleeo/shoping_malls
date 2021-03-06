<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AddToCartController extends Controller
{
    public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        // return $cart_data;
        return view('cart.cart_details')
            ->with('cart_data',$cart_data)
        ;
    }
    public function addtocart(Request $request)
    {

        $prod_id = $request->input('product_id');
        $quantity = $request->quantity;
        
        /*Check to make sure people don't order for more than what is in stock*/
        $availableQuantities = Product::find($prod_id);
        $availableQuantities= $availableQuantities->quantity;
        if($quantity > $availableQuantities){
            return response()->json(['status'=>"Available QTY is '$availableQuantities'"]);
        }

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->quantity;
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {
            $products = Product::find($prod_id);
            $prod_name = $products->product_name;
            $prod_image = $products->product_images;
            $priceval = $products->price;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart',]);
            }
        }
    }

    public function loadCartData()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(['totalcart' => $totalcart]); 
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(['totalcart' => $totalcart]); 
            return;
        }
    }
}
