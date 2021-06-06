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

    public function show($name, $id){
        $product = Product::where(['id'=>$id])->first();
        $images = $product->product_images;
        $images = explode('|',$images);
        $product_categories = ProductCategory::all();
        return view('products.product_details',compact('product','product_categories','images'));
    }
}
