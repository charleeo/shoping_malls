<?php

namespace App\Http\Controllers\Commons;


use Intervention\Image\Facades\Image;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shop;
use Exception;

class Commons 
{
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

    /** @return $filesArray and $error
  * **
  * @return #you should just get the file you want to upload get specify the extension you want and size. You can upload unlimited number of files
   */
   public static function uploadFiles($images,$extensions,$size,$path){
     $filesArray=[];
     $filesToDB =[];
     $error='';
     foreach($images as $key => $image){
         $fileRealName = $image->getClientOriginalName();
         $files = time().$key. $image->getClientOriginalName();
         $sizes = $image->getSize();
         $extension = $image->getClientOriginalExtension();
         if(!in_array($extension,$extensions)){
             $error= "$fileRealName has a wrong extension of .$extension which is not allowed.";
         }
         if($sizes > $size){
            $checkedSize= $sizes/1000;
            $maxSize =$size/1000;
             $error= "$fileRealName has a size of $checkedSize kilobytes which is larger than $maxSize kilobytes maximum size ";
         }
         $filesToDB[] = $path.$files;
         if(!is_dir($path) AND !file_exists($path)){ //make a dir for
             mkdir($path,0777,true);
         }
         Image::make($image)->resize(300,300)->save(public_path($path.$files));
         // $image->move(public_path($path),$files);
     }
         $filesArray['files_to_db']= $filesToDB;
         $filesArray['error'] = $error;
         if($error){
             foreach($filesArray['files_to_db'] as $file){
                $f= \public_path($file);
                 if(File::exists($f)){
                     unlink($f);
                 }
             }
         }
         return $filesArray;
 }
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
