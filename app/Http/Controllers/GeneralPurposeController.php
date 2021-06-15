<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ServiceAd;
use Illuminate\Http\Request;

class GeneralPurposeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','shop']);
    }
    
    public function createAds(){
        return view('ads_type.type');
    }
    /**Return a view for an authenticated user to access either his services records or products records */
    public function showServicesAndProducts(){
        return view('ads_type.both_service_and_products');
    }

    public function delete_form_image(Request $request){
        $product_id = $request->product_id;
        $adsType = $request->ads_type;
        $imagePath = $request->input_image_path;
        $imagePath = parse_url($imagePath,PHP_URL_PATH);
        $imagePath =\trim($imagePath,'/');
        $data =null;
        $imagesFromDB = '';
        if($adsType=='service'){//query the services_ads table
          $data = ServiceAd::find($product_id);
          $imagesFromDB = $data->service_images;
        }elseif($adsType=='product'){
            $data= Product::find($product_id);
            $imagesFromDB = $data->product_images;
        }

         $imagesFromDB = explode('|',$imagesFromDB);
         if(count($imagesFromDB) < 2){
            return response()->json(['status'=>'error']);
         }
         
         $key=  array_search($imagePath,$imagesFromDB);
         $response ='';
         $fileToRemove=\public_path($imagePath);
          if($key !== false){ 
            unset($imagesFromDB[$key]);
            if($adsType =='service'){
                $data->service_images = implode('|',$imagesFromDB);
                $t =$data->save();
                if($t==true) $response='Image has been removed';
                else $response='Image could not be removed. Please retry';
             }elseif($adsType == 'product'){
                 $data->product_images= implode('|',$imagesFromDB);
                 $t= $data->save();
                 if($t==true) $response='Image has been removed';
                else $response='Image could not be removed. Please retry';
             }

             if(file_exists($fileToRemove)) unlink($fileToRemove);
            return response()->json(['status'=>$response]);
        }        
    }
}
