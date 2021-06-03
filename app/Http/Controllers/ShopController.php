<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
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
           'business_name'=>'required|min:2|max:225',
           'business_phone_number' =>'required|numeric',
           'business_email'=>['nullable','email']
       ]);
       $specialChars =['@','!','>','<','\/','/','=','+','[]','%','#','.','|'];
       $name= str_replace(' ', '',$request->business_domain);
       
    //Validate the subdomain for special characters and number starting it
    if(is_numeric($name[0]) || $name[0] ==='_'|| $name[0]==='-'){
        return back()->withInput()->with('error',"Your business domain canot start with $name[0]");
    }
       foreach(str_split($name) as $n){
           if(in_array($n,$specialChars)){
               return back()->withInput()->with('error',"Your domain name contains the wrong characters $n");
           }
       }

        $owner= Auth::user()->id;

        $idCheck = Shop::where(['business_owner_id'=>$owner])->get(['id'])->first();
        $message = !empty($idCheck)?"Your business record has been updated":"Your business record has been created";
        $description= $request->description;
        // Check if it is a new record and make sure the business_domain does not conflict
        if(empty($idCheck->id)){
          $request->validate(['business_domain'=>['unique:shops']]);
        }else if(!empty($idCheck)){
        //check to make sure when a record is being updated, that we don't send an already subdomain for update which will cause sql integrity violation error
         $domain = Shop::where(['business_domain'=>$name])->get(['business_domain','id'])->first();
         if(!empty($domain) AND (int) $domain->id != (int)$idCheck->id){
            return back()->withInput()->with('error',"The domain name `$name` you entered is already in use. Please try a different name");
         }
        }

        Shop::updateOrCreate(
            ['business_owner_id'=>$owner],
            [
            'business_domain'=>$name,
            'description'=>$description,
            'business_owner_id'=>$owner,
            'business_picture'=>'not available',
            'business_name'=>$request->business_name,
            'business_phone_number'=>$request->business_phone_number,
            'business_email'=>$request->business_email,
            ]
        );
        return back()->with('success',$message);
    }



    public function uploadBusinessImage(Request $request){

            $request->validate([
                'profile_photo' => ['required', 'image']
            ]);
            $fullPath = 'assets/images/business_profiles/';

            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $profilePhoto = $request->file('profile_photo');
            $extension = $request->profile_photo->getClientOriginalExtension();
            if(!in_array($extension, $extensions)) return back()->with('error', 'supported file types are: jpg, gif, png, jpeg');
            $id = $request->business_id;
            $userID=Auth::user()->id;
            $business = Shop::where(['id'=>$id, 'business_owner_id'=>$userID])->first();
            
            $businessOldFileString = $business->business_picture;
            
            $pathToFle = public_path($businessOldFileString);
            if(file_exists($pathToFle)){unlink($pathToFle);}
            $fileName = time().'.'.$profilePhoto->getClientOriginalExtension();
            
            if(!is_dir($fullPath) AND !file_exists($fullPath)){ //make a dir for 
                mkdir($fullPath,0777,true);
            }
            Image::make($profilePhoto)->resize(200,200)->save(public_path($fullPath.$fileName));
            // ($profilePhoto->move(public_path($fullPath), $fileName));
            $business->update(['business_picture'=> "$fullPath/$fileName"]);
            return back()->with('success', 'Profile Image Uploaded successfully');

    }

public function createProfilePhoto(){
    $userID= Auth::user()->id;
        $businessDetails= Shop::where('business_owner_id','=',$userID)->first();
    return view('shops.shop_image',compact('businessDetails'));
}

}
