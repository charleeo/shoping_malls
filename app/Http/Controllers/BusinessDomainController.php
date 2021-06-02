<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class BusinessDomainController extends Controller
{
    private $domain;
    public function __construct(Request $requst){
        $this->domain = $requst->details;
    }

   public function index(){
       $businesses = Shop::all();
       return view('subdomain.index')->with('businesses',$businesses);
   }
    public function show(){
        $domain = Shop::where(['business_domain'=>$this->domain])->first();
        return view('subdomain.show')->with('domain',$domain);
    }


}
