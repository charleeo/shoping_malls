<?php

namespace App\Http\Controllers;

use App\Http\Traits\APIAuthTrait;
use App\Models\Shop;
use App\Models\SubAccount;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Auth;


class SubAccountContoller extends Controller
{  
    public $url;
    private $token;
    public $client;
    public $password;
    public $secret_k;
    public function __construct()
    {
        $this->middleware(['auth','shop']);
        $this->url= config('monnify.url');
        $this->token= APIAuthTrait::authenticate();
        $this->client = new Client();
        $this->password =config('monnify.password');
        $this->secret_k  = config('monnify.secret_k');
    }

    // Create the sub account
    public function createSubAccount(Request $request){
        $user = Auth::user();
        $responseData =[];
        $responseData['error'] ='';
        $responseData['success']='';
        
        $shop = Shop::where(['business_owner_id'=>$user->id])->get('id')->first();
        $shop_id= $shop->id;
       $subAccountId = SubAccount::where(['shop_id'=>$shop_id])->get('id')->first();
       //if you have created an account update it
       $method = "POST";
        $url = $this->url.'v1/sub-accounts';
        $requestBody =[
                "currencyCode"=> "NGN",
                "bankCode"=> $request->bankCode,
                "accountNumber"=> $request->accountNumber,
                "email"=>$user->email,
                "defaultSplitPercentage"=> 100,
        ];
        
    try{

        $response=  $this->client->request($method,$url,[
              'headers'=>[
                  'Content-Type'=>'application/json',
                  
                ],
                'auth' => [$this->secret_k, $this->password],
              'json'=> [$requestBody]
          ]);
          $response= json_decode($response->getBody(),true);
          $success= $response['requestSuccessful'];
          if($success==true){
              $responseBody = $response['responseBody'][0];
              $this->storeSubaccountData($responseBody,$shop_id);
              $responseData['success']="Acount created successfully";
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

    if($responseData['error']){
        return back()
        ->withInput()
        ->with('error', $responseData['error']);
    }else if($responseData['success']){
        return back()->with('success',$responseData['success']);
    }else{
        return back()->with('error',json_encode($responseData));
    }
        
}

    public function createSubAccountForm(){

        $banks=APIAuthTrait::setupRequest('GET',$this->url.'v1/banks',$this->token,'');

        $shop = Shop::where(['business_owner_id'=>Auth::user()->id])->get('id')->first();

       $subAccountId = SubAccount::where(['shop_id'=>$shop->id])->get(['id','accountNumber','bankCode'])->first();

        return view('shops.create_payment_account',compact('banks','subAccountId'));
    }

    public function storeSubaccountData($data,$shop_id){
                   
      SubAccount::updateOrCreate(
          ['shop_id'=>$shop_id],
          [
            "subAccountCode" => $data['subAccountCode'] ,
            "accountNumber" => $data['accountNumber'],
            "accountName" => $data['accountName'],
            "currencyCode" =>$data['currencyCode'],
            "email" => $data['email'],
            "bankCode" =>$data['bankCode'],
            "bankName" => $data['bankName'],
     "defaultSplitPercentage" => $data['defaultSplitPercentage'],
            'shop_id' => $shop_id,
            ]
          
      );
    }
}
