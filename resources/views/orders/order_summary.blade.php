@extends('layouts.app')
@section('title', "Orders details page |")
@section('content')
 <section>
     
     @if (isset($cart_data) && Cookie::get('shopping_cart') && count($cart_data)>0)
         @php  $grandTotal =0;@endphp
     
<div class="row justify-content-center p-3">
    <div class="col-md-6 col-sm-10">
        <div class="card m-1 ">
            <div class="card-header">
                <h2 class="text-center">
                  ORDER SUMMARY
                </h2>
            </div>
            <div class="card-body shadow">
                @foreach ($cart_data  as $c)
                @php
                $grandTotal  += $c['item_price'] * $c['item_quantity'];
                @endphp
                    <small class="px-2">Name: {{$c['item_name']}}</small>|
                    <small class="px-2">QTY: {{$c['item_quantity']}}</small>|
                    <small class="px-2">Price: &#8358; {{number_format( $c['item_price'])}}</small>|
                    <small>Total: &#8358; {{number_format($c['item_quantity']* $c['item_price'])}}</small>
                    <hr>
                @endforeach
                <h4 class="text-center">
                  Grand:  &#8358;{{number_format($grandTotal)}}
                </h4>
                <div class="form-group">
                    <input type="text" class="form-control"
                    placeholder="enter promo code here">
                </div>
                <div class="form-group"><button class="btn btn-sm btn-primary proceed-to-payment">Make Payment</button></div>
                </div>
            </div>
        </div>
    </div>
    @include('orders.place_order_modal')
     @else
      <p>Your Cart is currently empty</p>
     @endif
 </section>

 

@endsection
