<?php
namespace App\Http\Traits;

trait SumOfItemTrait{
          /** This helps to return the sum of all the items in a cart whencustomers increment or dercrement cart value */
          public static  function  getTheSumOfItemInACart($cart_data){
            $grandTotal=0;
            $price = array_column($cart_data,'item_price');
            $quantities = array_column($cart_data,'item_quantity');
            $arrayMap = array_map(function($x,$y){
            return $x *$y;
            },$quantities,$price);
            $grandTotal += array_sum($arrayMap);
            return $grandTotal;
        }
}