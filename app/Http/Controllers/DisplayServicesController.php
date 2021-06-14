<?php

namespace App\Http\Controllers;

use App\Models\ServiceAd;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class DisplayServicesController extends Controller
{
    public function index(){
        $services = ServiceAd::all();
        $serviceImages =[];
        if($services){
            foreach($services as $service){
                $serviceImages[]= $service->service_images;
            }
        }
        return view('services.all_services',compact('services','serviceImages'));
    }

    public function show($id,$name, Request $request){
        $service = ServiceAd::where(['id'=>$id])->first();
        $images = $service->service_images;
        $images = explode('|',$images);
        
        $shopID= $request->shop;

        $createdBySameSeller= ServiceAd::where(['service_shop_id'=>$shopID])
        ->inRandomOrder()
        ->paginate(6);

        
        return view('services.service_details',compact('service','images','createdBySameSeller'));
    }

}
