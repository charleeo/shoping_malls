@extends('layouts.app')
@section('title','Africa Shopping Malls Cart Page |')

@section('content')
    
<section class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> 
                    › <a href='/products'>Markets</a> › Cart</h5>
            </div>
        </div>
    </div>
    <hr>
    
    @if (isset($cart_data) && Cookie::get('shopping_cart') && count($cart_data)>0)
    @php  $grandTotal =0;@endphp
   <div class="shopping_cart_section px-2">
       <div class="d-flex pl-4">
           <div class="col-md-3 col-sm-3">Image</div>
           <div class="col-md-3 col-sm-3">Quantity </div>
           <div class="col-md-3 col-sm-3">Price( &#8358;)</div>
           <div class="col-md-3 col-sm-3">Sub Total(&#8358;)</div>
        </div>
        <hr>
          @include('cart.cart_actual_details');
    </div>
    @else
    <div class="row">
        <div class="col-md-12 mycard py-5 text-center">
            <div class="mycards">
                <h4>Your cart is currently empty.</h4>
                <a href="{{ url('/products') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Start Shopping</a>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection

@include('orders.place_order_modal')