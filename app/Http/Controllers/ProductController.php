<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Commons\Commons;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'price' =>['required', 'numeric','min:1'],
            'product_category'=>['required','numeric'],
            'delivery_status'=>['required'],
            'location'=>['required'],
            'product_name'=>['required','min:2','max:35'],
            'quantity' =>['required','numeric','min:1'],
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
               $imagesToDB= Commons:: uploadFiles($images,$extensions,$size,$path);
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
            $imagesToDB= Commons::uploadFiles($images,$extensions,$size,$path);
            $error = $imagesToDB['error'];
            if($error){
                return back()->with('error',$error);
            }
            $imagesToDB = $imagesToDB['files_to_db'];
            $imagesToDB=(implode('|',$imagesToDB));
        }
         $data = $request->except(['image','_token','service_id','input_image_path','product_id','ads_type']);
         
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

    public function edit($id){
        $product = Product::where(['id'=>$id,])->first();
        $images = $product->product_images;
        $images = explode('|',$images);
        $text="Update";
        $product_categories = ProductCategory::all();
        return view('products.edit_product',compact('product','product_categories','images','text'));
    }
}
