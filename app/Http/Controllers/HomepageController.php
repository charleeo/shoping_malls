<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $products= Product::all();
        return view('welcome')->with(['products'=>$products]);
    }
}
