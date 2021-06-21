<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ServiceAd;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $products= Product::all();
        $shops = Shop::all();
        $services = ServiceAd::get();
        return view('welcome')->with(['products'=>$products,'shops'=>$shops,'services'=>$services]);
    }
}
