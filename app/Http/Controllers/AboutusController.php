<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function aboutUs(){
        return view('pages.about');
        
    }
}
