<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth','shop']);
    }

    public function index(){
        $userID = Auth::user()->id;
        $shopID= Shop::where(['business_owner_id'=>$userID])->get('id')->first();
        $products = Product::where(['product_shop_id'=> $shopID->id])->get();
        $productImages =[];
        if($products){
            foreach($products as $pr){
                $productImages[]= $pr->product_images;
            }
        }
        return view('products.all-created',compact('products','productImages'));
    }

    public function create(){
        $product_categories = ProductCategory::all();
        $text ="Create";
        return view('products.create_product',compact('product_categories','text'));
    }

    public function store(Request $request){
            $shopID = Shop::where(['business_owner_id'=>Auth::user()->id])->first();
            $request->validate([
            'product_description' =>['required','min:12'],
            'price' =>['required', 'numeric'],
            'product_category'=>['required','numeric'],
            'delivery_status'=>['required'],
            'location'=>['required'],
            'product_name'=>['required','min:2','max:35'],
            'quantity' =>['nullable','numeric'],
            'discount'=>['nullable','numeric']
            ]);

            $path = 'assets/images/product_images/';
            $extensions = ['jpg','png','jpeg','gif'];
            $size = 2084000;
            $productID = $request->product_id;
            $message= $productID?
           'Your store records has been updated':
           'New store records created successfully';
            //old resource update with file upload
            if($productID && $request->hasFile('image')){
                $productDetails = Product::where(['id'=>$productID])->first();
                $imagesFromDB = $productDetails->product_images;
                $imagesFromDB = explode('|',$imagesFromDB);
                $images = $request->file('image');
               $imagesToDB= $this->uploadFiles($images,$extensions,$size,$path);
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
        }//old resource update without file upload
        elseif($productID && !$request->hasFile('image')){
            $productDetails = Product::where(['id'=>$productID])->first();
            $imagesFromDB = $productDetails->product_images;
            $imagesToDB = $imagesFromDB;//return old images path back to DB
        }//for new resource creation
        else if(!$productID){
            $request->validate(['image'=>['required']]);
            $images = $request->file('image');
            $imagesToDB= $this->uploadFiles($images,$extensions,$size,$path);
            $error = $imagesToDB['error'];
            if($error){
                return back()->with('error',$error);
            }
            $imagesToDB = $imagesToDB['files_to_db'];
            $imagesToDB=(implode('|',$imagesToDB));
        }
         $data = $request->except(['image','_token','product_id']);
         $data['product_images'] =$imagesToDB;
         $data['product_shop_id'] = $shopID->id;
         $result=Product::updateOrCreate(
            ['id'=>$productID],
            $data
        );
        if($result){
            return back()->with('success',$message);
        }
    }

    /** @return $filesArray and $error
     * **
     * @return #you should just get the file you want to upload get specify the extension you want and size. You can upload unlimited number of files
      */
    public function uploadFiles($images,$extensions,$size,$path){
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


    public function edit($id){
        $product = Product::where(['id'=>$id,])->first();
        $images = $product->product_images;
        $images = explode('|',$images);
        $text="Update";
        $product_categories = ProductCategory::all();
        return view('products.edit_product',compact('product','product_categories','images','text'));
    }
}
