<?php

namespace App\Http\Controllers;

use App\Http\Traits\FileUploadTrait;
use App\Models\ProductCategory;
use App\Models\ServiceAd;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceAdsController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth','shop']);
    }
 /**Show all Service ads by an individual */
 public function index(){
    $userID = Auth::user()->id;
    $shopID= Shop::where(['business_owner_id'=>$userID])->get('id')->first();
    $services = ServiceAd::where(['service_shop_id'=> $shopID->id])->get();
    $serviceImages =[];
    if($services){
        foreach($services as $pr){
            $serviceImages[]= $pr->service_images;
        }
    }
    return view('services.all-created',compact('services','serviceImages'));
    }

    public function create(){
        $product_categories = ProductCategory::all();
        $text ="Create";
        return view('services.create_service',compact('product_categories','text'));
    }

    public function store(Request $request){
        $shopID = Shop::where(['business_owner_id'=>Auth::user()->id])->first();
        $request->validate([
            'service_name'=>['required','min:2','max:35'],
            'price' =>['required', 'numeric'],
            'service_location'=>['required'],
            'service_description' =>['required','min:12'],
        ]);

        $path = 'assets/images/service_images/';
        $extensions = ['jpg','png','jpeg','gif'];
        $size = 2084000;
        $serviceID = $request->service_id;
        $message= $serviceID?
       'Your store records has been updated':
       'New store records created successfully';
        //old resource update with file upload
        if($serviceID && $request->hasFile('image')){
            $serviceDetails = ServiceAd::where(['id'=>$serviceID])->first();
            $imagesFromDB = $serviceDetails->service_images;
            $imagesFromDB = explode('|',$imagesFromDB);
            $images = $request->file('image');
            $imagesToDB= FileUploadTrait::uploadFiles($images,$extensions,$size,$path);
            $error = $imagesToDB['error'];
            if($error){
                return back()->with('error',"$error");
            }
            $imagesToDB = implode('|', $imagesToDB['files_to_db']);
        //    Unlink the old images
        if(count($imagesFromDB)>0){
                foreach($imagesFromDB as $im){
                $imageToRemove = \public_path($im);
                if(File::exists($imageToRemove)){
                    unlink($imageToRemove);
                }
            }
        }
    }
    //old resource update without file upload
    elseif($serviceID && !$request->hasFile('image')){
        $serviceDetails = ServiceAd::where(['id'=>$serviceID])->first();
        $imagesFromDB = $serviceDetails->service_images;
        $imagesToDB = $imagesFromDB;//return old images path back to DB
    }
    //for new resource creation
    else if(!$serviceID){
        $request->validate(['image'=>['required']]);
        $images = $request->file('image');
        $imagesToDB= FileUploadTrait::uploadFiles($images,$extensions,$size,$path);
        $error = $imagesToDB['error'];
        if($error){
            return back()->with('error',$error);
        }
        $imagesToDB = $imagesToDB['files_to_db'];
        $imagesToDB=(implode('|',$imagesToDB));
    }

     $data = $request->except(['image','_token','service_id','input_image_path','product_id','ads_type']);

     $data['service_images'] =$imagesToDB;
     $data['service_shop_id'] = $shopID->id;
     $result=ServiceAd::updateOrCreate(
        ['id'=>$serviceID],
        $data
    );

    if($result){
        return back()->with('success',$message);
    }
  }

  public function edit($id){
    $service = ServiceAd::where(['id'=>$id,])->first();
    $images = $service->service_images;
    $images = explode('|',$images);
    $text="Update";
    return view('services.edit_service',compact('service','images','text'));
}
}
