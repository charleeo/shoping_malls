<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','shop']);
    }

    /**Delete a Product or an ad from the system */
    public function deleteProduct($id){
        $product = Product::find($id);
        $user = Auth::user()->id;

        $shop = Shop::where('business_owner_id','=',$user)->firstOrFail();
        if($product AND $product->product_shop_id !==$shop->id){
            return back()->with('error',"You are trying to delete a resources you didn't create");
        }else{
            if($product){
                $productImages = $product->product_images;
                $productImages = explode('|',$productImages);
                foreach($productImages as $image){
                    $imageToRemove= \public_path($image);
                        if(file_exists($imageToRemove)){
                        unlink($imageToRemove);
                        }
                }
                if( $product->delete()){
                    return back()->with('success',"Item deleted Successfuly");
                }else{
                    throw new Exception('Error');
                }
            }
        }
        
    }
}
