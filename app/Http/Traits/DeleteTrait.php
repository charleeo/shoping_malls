<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Exception;

trait DeleteTrait{        

         public static function deleteFunction($product,        $product_shop_id,$product_images){
             $user = Auth::user()->id;
             $shop = Shop::where('business_owner_id','=',$user)->firstOrFail();
             if($product AND $product->$product_shop_id !==$shop->id){
                 return back()->with('error',"You are trying to delete a resources you didn't create");
             }else{
                 if($product){
                     $productImages = $product->$product_images;
                     $productImages = explode('|',$productImages);
                     foreach($productImages as $image){
                         $imageToRemove= \public_path($image);
                             if(file_exists($imageToRemove)){
                             unlink($imageToRemove);
                             }
                     }
                     if( $product->delete()){
                         return true;
                     }else{
                         throw new Exception('Error');
                     }
                 }
             }
         }
}