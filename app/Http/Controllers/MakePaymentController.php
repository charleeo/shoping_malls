<?php

namespace App\Http\Controllers;

use App\Http\Traits\APIAuthTrait;
use App\Models\Shop;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7;

class MakePaymentController extends Controller
{
    public $url;
    private $token;
    public $client;
    public $password;
    public $secret_k;
    public $contract_code;
    public function __construct()
    {
        $this->url= config('monnify.url');
        $this->token= APIAuthTrait::authenticate();
        $this->client = new Client();
        $this->password =config('monnify.password');
        $this->secret_k  = config('monnify.secret_k');
        $this->contract_code  = config('monnify.contract_code');
    }

    public function initiateTransaction(Request $request){
        $num = mt_rand(100,8000000);
       $method = "POST";
        $url = $this->url.'v1/merchant/transactions/init-transaction';
      $data=  [
            "amount"=> 1000.00,
            "customerName"=> "Stephen Ikhane",
            "customerEmail"=> "stephen@ikhane.com",
            "paymentReference"=> $num,
            "paymentDescription"=> "Trial transaction",
            "currencyCode"=> "NGN",
            "contractCode"=>$this->contract_code,
            "redirectUrl"=> "http://127.0.0.1:8000/payments/success",
            "paymentMethods"=>["CARD","ACCOUNT_TRANSFER"],  
      ];
    $responseData=[];
    $responseData['error']='';
    $responseData['success']='';
    try{

        $response=  $this->client->request($method,$url,[
              'headers'=>[
                  'Content-Type'=>'application/json',  
                ],
                'auth' => [$this->secret_k, $this->password],
              'json'=> $data,
          ]);

          $response= json_decode($response->getBody(),true);
        //   dd($response);
          $success= $response['requestSuccessful'];

          if($success==true){

              $responseBody = $response['responseBody'];
            //   dd($responseBody);
            return  redirect($responseBody['checkoutUrl']);
             
          }else{
              $responseData['error']="There was an error, please try again";
          }
                    
        }
     catch (RequestException $e) {

        // Catch all 4XX errors 
    
        // To catch exactly error 400 use 
        if ($e->getResponse()->getStatusCode() == '400') {
                $responseData['error'] = "Please check your form inputs and try again";
        }
        // echo Psr7\Message ::toString($e->getRequest());
        if ($e->hasResponse()) {
            $resp= Psr7\Message::toString($e->getResponse());
            $ex=(explode(',',$resp));            
            $responseData['error']= $ex[5];

        }
    }catch(ConnectionException $e){
        $responseData['error']= 'Please check your network connection and try again';
    }

    // if($responseData['error']){
    //     return back()
    //     ->withInput()
    //     ->with('error', $responseData['error']);
    // }else if($responseData['success']){
    //     return back()->with('success',$responseData['success']);
    // }else{
    //     return back()->with('error',json_encode($responseData));
    // }
        
}
}
