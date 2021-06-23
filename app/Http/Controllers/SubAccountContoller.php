<?php

namespace App\Http\Controllers;

use App\Http\Traits\APIAuthTrait;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SubAccountContoller extends Controller
{  
    public $url;
    public function __construct()
    {
        $this->url= config('monnify.url');
    }
    public function createSubAccount(){
        $url = $this->url.'v1/sub-accounts';
        $banks=APIAuthTrait::getBanks();
        // $client = new Client();
        // $response = $client->request('POST',$url,[
        //     'headers'=> 
        // ])
        return $banks;
    }
}
