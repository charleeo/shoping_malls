<?php

return [

    'password' => env('MONNIFY_PASSWORD',null),

    'secret_k' => env('MONNIFY_SECRET_KEY',null),

    
    'url' => env('MONNIFY_BASE_URL', 'https://sandbox.monnify.com/api/',null),

    'contract_code' => env('MONNIFY_CONTRACT_CODE', null),


];
