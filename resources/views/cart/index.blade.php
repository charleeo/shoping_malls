@extends('layouts.app')
@section('title','Africa Shopping Malls Cart Page |')

@section('content')
    
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
            </div>
        </div>
    </div>
</section>

<section class="section">
 <div class="container">
  <div class="row">
   <div class="col-md-12">
    @if(isset($cart_data))
     @if(Cookie::get('shopping_cart'))
        @php $total="0" @endphp
    <div class="shopping-cart">
        <div class="shopping-cart-table">
            <div class="table-responsive">
                <div class="col-md-12 text-right mb-3">
            <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
        </div>
        <table class="table table-bordered my-auto  text-center">
                <thead>
                    <tr>
                        <th class="cart-description">Image</th>
                        <th class="cart-product-name">Product Name</th>
                        <th class="cart-price">Price</th>
                        <th class="cart-qty">Quantity</th>
                        <th class="cart-total">Grandtotal</th>
                        <th class="cart-romove">Remove</th>
                    </tr>
                </thead>
                <tbody class="my-auto">
                    @foreach ($cart_data as $data)
                    <tr class="cartpage">
                        <td class="cart-image">
                            <a class="entry-thumbnail" href="javascript:void(0)">
                                <img src="{{ asset('admin/uploads/productcatelist/'.$data['item_image']) }}" width="70px" alt="">
                            </a>
                        </td>
                        <td class="cart-product-name-info">
                            <h4 class='cart-product-description'>
                                <a href="javascript:void(0)">{{ $data['item_name'] }}</a>
                            </h4>
                        </td>
                        <td class="cart-product-sub-total">
                            <span class="cart-sub-total-price">{{ number_format($data['item_price'], 2) }}</span>
                        </td>
                        <td class="cart-product-quantity">
                                <input type="number" class="qty-input form-control" value="{{ $data['item_quantity'] }}" min="1" max="100"/>
                        </td>
                        <td class="cart-product-grand-total">
                            <span class="cart-grand-total-price">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                        </td>
                        <td style="font-size: 20px;">
                            <button type="button" class="delete_cart_data"><li class="fa fa-trash-o"></li> Delete</button>
                        </td>
                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- /table -->
    </div>
</div><!-- /.shopping-cart-table -->
<div class="row">
    <div class="col-md-8 col-sm-12 estimate-ship-tax">
        <div>
            <a href="{{ url('collections') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
        </div>
    </div><!-- /.estimate-ship-tax -->

    <div class="col-md-4 col-sm-12 ">
        <div class="cart-shopping-total">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="cart-subtotal-name">Subtotal</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="cart-subtotal-price">
                        Rs.
                        <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="cart-grand-name">Grand Total</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="cart-grand-price">
                        Rs.
                        <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-checkout-btn text-center">
                        @if (Auth::user())
                            <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                        @else
                            <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                            {{-- you add a pop modal for making a login --}}
                        @endif
                        <h6 class="mt-3">Checkout with Fabcart</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div><!-- /.shopping-cart -->
    @endif
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

</div>
</div> <!-- /.row -->
</div><!-- /.container -->
</section>

@if (isset($cart_data) && Cookie::get('shopping_cart'))

   <div class="shopping_cart_section px-2">
       <div class="d-flex pl-4">
           <div class="col-md-3 col-sm-3">Image / Name</div>
           <div class="col-md-3 col-sm-3">Quantity</div>
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
            $total= 0;         
            @endphp
                <div class="col-md-3 col-sm-3">
                    
                   <img src="  {{asset($images[0])}}" alt="{{$data['item_name']}}"
                   class="item-image mb-2"> 
                   <p>{{$data['item_name']}}</p>
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
                    @php
                        $total = $data['item_price'] * $data['item_quantity']
                    @endphp
                    {{number_format($total,2)}}
                </div>
            </div>
          </div> 
       </div>
       <hr>
       @endforeach
   </div>
    
@endif
  
@endsection