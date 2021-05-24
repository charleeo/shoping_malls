<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterForm(){
        return view('auth.register2');
    }

    protected function storeUsers(Request $request)
    {  //approach one, we can simply mass asign all the attributes by requesting all
        $data =$request->all();

        $validator= Validator::make($data,[
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' =>['nullable','max:14','min:9'],
            'age' =>['nullable','numeric'],
        ]);
        if($validator->stopOnFirstFailure()->fails()){ //The stopOnFirstFailure() method will return the first error encounter and stop the check
            return response()->json(['error'=>$validator->errors()]);
        }
        $data['password']= Hash::make($data['password']);//Hash the password before saving to database
       //we can also use the create method instead of using the new user instance
         $user = User::create($data);
        if($user){
            return response()->json(['success'=>'User created successfully. click on the login button to login with your details']);
        }else {
            return response()->json(['error'=>'There was an unexpected error, please retry']);
        }
    }

}
