<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Commons\Commons;
use App\Models\Product;
use App\Models\ServiceAd;


class DeleteProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','shop']);
    }

    /**Delete a Product or an ad from the system */
    public function deleteProduct($id){
        $product = Product::find($id);
        if(Commons::deleteFunction($product,'product_shop_id','product_images')){
            return back()->with('success',"Item deleted Successfuly");
        }  
    }
    
    
    public function deleteService($id)
    {
       $service = ServiceAd::find($id);
       if(Commons::deleteFunction($service,'service_shop_id','service_images')){
        return back()->with('success',"Item deleted Successfuly");
       }
    }
}
