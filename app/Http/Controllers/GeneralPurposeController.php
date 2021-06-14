<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralPurposeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','shop']);
    }
    
    public function createAds(){
        return view('ads_type.type');
    }
    /**Return a view for an authenticated user to access either his services records or products records */
    public function showServicesAndProducts(){
        return view('ads_type.both_service_and_products');
    }
}
