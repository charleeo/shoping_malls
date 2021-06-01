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
    public function createBusiness(){
        $userID= Auth::user()->id;
        $businessDetails= Shop::where('business_owner_id','=',$userID)->first();
        return view('shops.create_shops',compact(['businessDetails']));
    }

    /**Here we store the shop or business information into the database. We will be using a simple approach to insert or update the records */
   public function storeBusiness(Request $request){
      $request->validate([
           'business_domain' =>['required','string','min:1', 'max:20'],
           'description' =>['required', 'string', 'min:10'],
           'business_name'=>'required|min:2|max:225'
       ]);
       $specialChars =['@','!','>','<','\/','/','=','+','[]','%','#','.','|'];
       $name= str_replace(' ', '',$request->business_domain);
       $nameArray = str_split($name,1);

       foreach($nameArray as $n){
           if(is_numeric($n[0]) || $n[0] =='_'){
               return back()->withInput()->with('error',"Your business domain canot start with $n[0]");
           }
           if(in_array($n,$specialChars)){

               return back()->withInput()->with('error',"Your domain name contains the wrong characters $n");
           }
       }

        $owner= Auth::user()->id;
        $idCheck = Shop::where(['business_owner_id'=>$owner]);
        $message = !empty($idCheck)?"Your business record has been updated":"Your business record has been created";

        $description= $request->description;
        Shop::updateOrCreate(
            ['business_owner_id'=>$owner],
            [
            'business_domain'=>$name,
            'description'=>$description,
            'business_owner_id'=>$owner,
            'business_picture'=>'not available',
            'business_name'=>$request->business_name,
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
