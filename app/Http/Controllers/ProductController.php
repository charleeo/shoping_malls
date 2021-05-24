<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  public  function __construct()
    {
      $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.all_products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all();

       return view('products.create_product',compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>['required'],
            'quantities'=>['sometimes'],
            'visibility'=>['required','min:3','max:225'],
            'price'=>['required','numeric'],
            'product_name' =>['required','min:3','max:60'],
            'categories' =>['required'],
            'delivery_status'=>['required'],
            'description' =>['required'],
            ]);

    // remove those files that are the storage which does not have path in the database

        $images = $request->file('image');
        $path ='assets/images/product_photo/';
        $allowedExtensions = ['jpg','jpeg','gif','png']; //extension allowed
        $FileNameArray = [];
        $size = 2084000; //maximum file size should be 2 megabytes

        //loop through the images selected to access each file
        foreach($images as $key=>$image){
            $extension=  $image->getClientOriginalExtension();
            $FileName = $image->getClientOriginalName();
            $newName = $key.time().'-'.$FileName;
            $FileNameArray[] = $path. $newName;//push the newName string into the $FileNameArray

            //check for size
            if($image->getSize() > $size){
                return back()->with('error',"Maximum file size should not be more than 2mb");
            }
            //Check for the extension
            if(!in_array($extension,$allowedExtensions)){
                return back()->with('error',".$extension extension not allowed");
            }
            $image->move(public_path($path), $newName);
        }
        // File upload process and validation ends here. Now we want to send the information to database
            //Get the shop id of the authenticated user
            $shopId = Shop::where('shop_owner_id','=',Auth::user()->id)->first();
            $id = $request->product_id;

            Product::updateOrCreate(
                ['id'=>$id],
                [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'quantity' =>$request->quantities,
                'location' => $request->visibility,
                'product_description' => $request->description,
                'product_images' => implode('|',$FileNameArray),
                'product_shop_id' => (int) $shopId->id,
                'product_category' => (int) $request->categories,
                'delivery_status' => $request->delivery_status,
                ]
            );
            // $product->product_name = $request->product_name;
            // $product->price = $request->price;
            // $product->quantity =$request->quantities;
            // $product->location = $request->visibility;
            // $product->product_description = $request->description;
            // $product->product_images = implode('|',$FileNameArray);
            // $product->product_shop_id = (int) $shopId->id;
            // $product->product_category = (int) $request->categories;
            // $product->delivery_status = $request->delivery_status;
            // if($product->save()){
                return back()->with('success','Your shop has been stocked up');
            // }
            // return back()->with('error','There was an error, please retry');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $product_categories = ProductCategory::all();
        $product = Product::where(['id'=>$id])->firstOrFail();
        $images = explode('|',$product->product_images);
        return view('products.update_product', compact('product_categories','product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fileUpload = Product::find($id);

        $fileUpload->delete();

        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

}
