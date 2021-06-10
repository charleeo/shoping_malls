<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DisplayProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        $productImages =[];
        if($products){
            foreach($products as $pr){
                $productImages[]= $pr->product_images;
            }
        }
        return view('products.all_products',compact('products','productImages'));
    }

    public function show($name, $id, Request $request){
        $product = Product::where(['id'=>$id])->first();
        $images = $product->product_images;
        $images = explode('|',$images);
        $product_categories = ProductCategory::all();
        $category = $request->category;
        $shopID= $request->shop;
        $createdBySameSeller= Product::where(['product_shop_id'=>$shopID])
        ->where('product_category','!=',$category)
        ->inRandomOrder()
        ->paginate(6);

        $relatedItems = Product::where(['product_category'=>$category])
        ->where('id','!=',$id)
        ->inRandomOrder()
        ->paginate(6);
        // ->get(['id','product_name','price','quantity','product_description','delivery_status','location','product_images']);

        return view('products.product_details',compact('product','product_categories','images','relatedItems','createdBySameSeller'));
    }

    public function getRelatedItems($relationship){

    }
}
