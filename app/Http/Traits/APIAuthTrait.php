<?php

namespace  App\Http\Traits;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

trait APIAuthTrait
{

    public static function authenticate(){
    $url = config('monnify.url').'v1/auth/login';
    $password =config('monnify.password');
    $secret_k  = config('monnify.secret_k');
    $contract_code = config('monnify.contract_code');
    $client = new Client();
    $response = $client->request(
        'POST',
        $url,
        [
          'auth' => [$secret_k, $password]
        ]
    );
       $response = json_decode($response->getBody(),true);
       $accessToken = $response['responseBody']['accessToken'];
       return $accessToken;
  }

  public static function setupRequest($method,$url,$token =null,$body){
      $headers=['headers'=>['Content-Type'=> 'application/json']];
      $client = new Client();
        if($token !=null AND strlen($token) !=''){
            $headers=['headers'=>['Content-Type'=> 'application/json',"Authorization"=>" Bearer {$token}"]];
        }
        if($body){
           $headers['form_params']= $body;
        }
        // dd($headers);
        $response= $client->request($method, $url, $headers);
        $response= json_decode($response->getBody(),true);
        $result = $response['responseBody'];
        return $result;
  }
//    public static function getBanks(){
//     $url='https://sandbox.monnify.com/api/v1/banks';
//     $token= self::authenticate();
//     $response=  self::setupRequest('GET',$url,$token);
//     return $response;
//    }
}


// $client->request('GET', $url,[
    //     'headers'=>[
    //         'Content-Type'=>'application/json',
    //         "Authorization"=>"Bearer {$token}",
    //         ],
    // ]);
    // $response= json_decode($response->getBody(),true);
    // $banks = $response['responseBody'];
