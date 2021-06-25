<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PaymentSuccessfullController extends Controller
{
    public function paymentWasSuccessfull(){
        Cookie::queue(Cookie::forget('shopping_cart'));
        echo session('amount');
        $transactionRef =  htmlspecialchars($_GET['paymentReference']);
        
        dd($transactionRef);
        exit;
        return view('payments.payment_was_successfull');
    }
}
