<?php

namespace App\Http\Controllers;

use App\Http\Traits\APIAuthTrait;
use App\Models\Shop;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class MakePaymentController extends Controller
{
    private $url;
    private $password;
    private $secret_k;
    private $contract_code;
    private $appURL;
    public function __construct()
    {
        $this->url= config('monnify.url');
        $this->appURL= config('app.url');
        $this->token= APIAuthTrait::authenticate();
        $this->client = new Client();
        $this->password =config('monnify.password');
        $this->secret_k  = config('monnify.secret_k');
        $this->contract_code  = config('monnify.contract_code');
    }

    public function initiateTransaction(Request $request){
        $num = mt_rand(100,8000000).time();
        $description = $request->paymentDescription;
        $customerName =$request->customerName;
        $customerEmail = $request->customerEmail;
        $adressLine1 = $request->address_line_1;
        $address_line2 = $request->address_line_2;
        $phone = $request->phone_number;
        $amount =$request->amount;
        if(!$description OR strlen($description) <1){
            $description= "$customerName payment";
        }
        $data=  [
            "amount"=> $amount,
            "customerName"=> $customerName,
            "customerEmail"=> $customerEmail,
            "paymentReference"=> $num,
            "paymentDescription"=> $description,
            "currencyCode"=> "NGN",
            "contractCode"=>$this->contract_code,
            "redirectUrl"=> "$this->appURL/payments/success",
            "paymentMethods"=>["CARD","ACCOUNT_TRANSFER"],
        ];
            $data['address_1']=$adressLine1;
            $data['addres_2']=$address_line2;
            $data['phone'] = $phone;
            $this->putVariablesInSession($data);
            return  $this->processPayment($data);
    }
    private function processPayment($data){
    $url = $this->url.'v1/merchant/transactions/init-transaction';
    $responseData=[];
    $responseData['error']='';
    $responseData['success']='';

    $response = Http::withBasicAuth($this->secret_k, $this->password)->post(
        $url,$data
    );
    if( $response->successful()){
        $response=$response->json() ;
        $responseData['success'] = $response['responseBody']['checkoutUrl'];
        return  redirect ($responseData['success']);
    }else if($response->failed()){
       $response->throw();
    }else if( $response->clientError()){
        $response->throw();
    }else if($response->serverError()){
        $response->throw();
    }else  return  redirect()->back();
}

private function putVariablesInSession(array $varr){
        foreach($varr as $k=>$v){
            Session::put($k,$v);
        }
        return;
    }
}


// try{
//     $response=  $this->client->request('POST',$url,[
//           'headers'=>[
//               'Content-Type'=>'application/json',
//             ],
//             'auth' => [$this->secret_k, $this->password],
//           'json'=> $data,
//       ]);

//       $response= json_decode($response->getBody(),true);
//       $success= $response['requestSuccessful'];
//       if($success==true){
//           $responseBody = $response['responseBody'];
//         //   dd($responseBody);
//         $responseData['success']= $responseBody['checkoutUrl'];
//       }

//     }
//     catch (RequestException $e) {

//         if ($e->getResponse()->getStatusCode() == '400') {
//                 $responseData['error'] = "Please check your form inputs and try again";
//         }
//         echo Psr7\Message ::toString($e->getRequest());
//         if ($e->hasResponse()) {
//             $resp= Psr7\Message::toString($e->getResponse());
//             $ex=(explode(',',$resp));
//             $responseData['error']= $ex[5];
//         }
//     }catch(ConnectException $e){

//         $responseData['error'] = "Please check your connection";
//     }catch(ConnectionException $e){
//         $responseData['error'] = json_encode($e);
//     }
//    if($responseData['error'] !=''){
//        return back()->with('error',$responseData['error']);
