<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('products.create_product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
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
        'image'=>['required']
        ]);
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
            $FileNameArray[] = $path. $newName.',';//push the newName string into the $FileNameArray

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
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(Product $fileUpload)
    {
        //
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
