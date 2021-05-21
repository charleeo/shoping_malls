<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public $userID;
   public function __construct(){
       $this->middleware('auth');
   }
   public function getAuthUser(){
       return Auth::user()->id;
   }
    public function createShop(){
        $userID= Auth::user()->id;
        $shopDetails= Shop::where('shop_owner_id','=',$userID)->first();
        $categories =BusinessCategory::get()->toArray();
        return view('shops.create_shops',compact(['categories','shopDetails']));
    }

    /**Here we store the shop or business information into the database. We will be using a simple approach to insert or update the records */
   public function storeShop(Request $request){
      $message= 'Your business record has been created';
      $request->validate([
           'business_name' =>['required','string','min:3', 'max:20'],
           'description' =>['required', 'string', 'min:10'],
           'business_category_id'=>['required', 'integer']
       ]);
        $owner= Auth::user()->id;
        $idCheck = Shop::where(['shop_owner_id'=>$owner]);
        if($idCheck !==null)$message = "Your business record has been updated";
        $name= str_replace(' ', '',$request->business_name);
        $description= $request->description;
        $category_id= $request->business_category_id;
        Shop::updateOrCreate(
            ['shop_owner_id'=>$owner],
            [
            'shop_name'=>$name,
            'description'=>$description,
            'shop_owner_id'=>$owner,
            'business_category_id'=>$category_id ,
            'shop_picture'=>'it is enmpty'
            ]
        );
        return back()->with('success',$message);
    }

    

    public function uploadBusinessImage(Request $request){

            $request->validate([
                'profile_photo' => ['required', 'image']
            ]);
            
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $profilePhoto = $request->file('profile_photo');
            $extension = $request->profile_photo->getClientOriginalExtension();
            if(!in_array($extension, $extensions)) return back()->with('error', 'supported file types are: jpg, gif, png, jpeg');
            $id = $request->business_id;
            $userID=Auth::user()->id;
            $business = Shop::where(['id'=>$id, 'shop_owner_id'=>$userID])->first();
            // dd($business);
            $businessOldFileString = $business->shop_picture;
            $pathToFle = public_path($businessOldFileString);

            if(File::exists($pathToFle))unlink($pathToFle);

            $fileName = time().'.'.$profilePhoto->getClientOriginalExtension();
            $fullPath='assets/images/business_profiles/';
            ($profilePhoto->move(public_path($fullPath), $fileName));
            $business->update(['shop_picture'=> "$fullPath/$fileName"]);
            return back()->with('success', 'Profile Image Uploaded successfully');
        
    }



}
