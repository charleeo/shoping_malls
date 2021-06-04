<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $products= Product::all();
        $shops = Shop::all();
        return view('welcome')->with(['products'=>$products,'shops'=>$shops]);
    }
}
