<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentSuccessfullController extends Controller
{
    public function paymentWasSuccessfull(){
        
        return view('payments.payment_was_successfull');
    }
}
