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
    
    @if (isset($cart_data) && Cookie::get('shopping_cart'))
   @php
       $grandTotal =0;
   @endphp
   <div class="shopping_cart_section px-2">
       <div class="d-flex pl-4">
           <div class="col-md-3 col-sm-3">Image</div>
           <div class="col-md-3 col-sm-3">Quantity </div>
           <div class="col-md-3 col-sm-3">Price( &#8358;)</div>
           <div class="col-md-3 col-sm-3">Sub Total(&#8358;)</div>
        </div>
        <hr>
        
        @foreach ($cart_data as $data )
       <div class="row justify-content-center">
           <div class="col-md-12 col-sm-12">
               <div class="items-table">
                   @php
            $images =explode('|',$data['item_image']);          
            @endphp
                <div class="col-md-3 col-sm-3">
                    
                    <img src="  {{asset($images[0])}}" alt="{{$data['item_name']}}"
                    class="item-image mb-2"> 
                </div>
                <div class="col-md-3 col-sm-2">
                    <input type="number" 
                    value="{{$data['item_quantity']}}"
                    class="item-quantity form-control" name="item_quantity">
                </div>
                <div class="col-md-3 col-sm-4">
                    <p>{{number_format($data['item_price'],2)}}</p>
                </div>
                <div class="col-md-3 col-sm-3">
                    {{number_format($data['item_quantity']* $data['item_price'],2)}}
                </div>
            @php
                $grandTotal  += $data['item_price'] * $data['item_quantity'];
            @endphp
            </div>
        </div> 
       </div>
       <div class="item-name-action">
           <div class="col-md-4 col-sm-5">
               <small>Name: <b>{{$data['item_name']}}</b> </small>
           </div>
           <div class="col-md-4 col-sm-5">
               <small>Action: <b><i class="fas fa-trash text-danger"></i></b> </small>
        </div>
    </div>
    <hr>
       @endforeach
       <div class="cart-grand-total">
           <div class="sub">
            <small>Sub Total: &#8358; <b>{{number_format($grandTotal,2)}}</b> </small>
            <hr>
        </div>
        <div class="grand">
            <small>Grand Total: &#8358; <b>{{number_format($grandTotal,2)}}</b> 
            </small>
            <hr>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12 mycard py-5 text-center">
        <div class="mycards">
            <h4>Your cart is currently empty.</h4>
            <a href="{{ url('collections') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
        </div>
    </div>
</div>
@endif
</section>
@endsection