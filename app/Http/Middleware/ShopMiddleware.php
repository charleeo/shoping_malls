<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shops;

class ShopMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    
        $user = Auth::user();
        if($user){
            $shop = Shop::where('business_owner_id','=',$user->id)->first();
            if($shop){
                return $next($request);
            }else{
                return redirect('/shops/create')->with('error','You should create a shop before attempting to create an advertisement');
            }
        }else{
         return redirect('/shops/create')->with('error','You should create a shop before attempting to create an advertisement');
        }
    }
}


// public function handle($request, Closure $next)
// {
//     if (auth()->user()->status == 'active') {
//         return $next($request);
//     }
//     return response()->json('Your account is inactive');

// }
