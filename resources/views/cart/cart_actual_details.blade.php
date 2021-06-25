@foreach ($cart_data as $data )
<div class="to-be-removed" id="{{$data['item_id']}}">
    <div class="row justify-content-center remove-item">
        <div class="col-md-8 col-sm-12 parent">
            <div class="items-table">
            @php
            $images =explode('|',$data['item_image']);          
            @endphp
                <div class="col-md-3 col-sm-3">
                    
                    <img src="  {{asset($images[0])}}" alt="{{$data['item_name']}}"
                    class="item-image mb-2"> 
                </div>
                <div class="col-md-3 col-sm-2">
                    @include('cart.item_quantities')
                </div>
                <div class="col-md-3 col-sm-4">
                    <p> {{number_format($data['item_price'],2)}}</p>
                </div>
                <div class="col-md-3 col-sm-3">
    
                  <input type="text" value="{{number_format($data['item_quantity'] * $data['item_price'],2)}}" 
                  readonly class="item_sub_price pr-3 border-0"
                  />
                </div>
            @php
                $grandTotal  += $data['item_price'] * $data['item_quantity'];
            @endphp
            </div>
        </div> 
    </div>
</div>
@include('cart.item_action_name')  
@endforeach

@include('cart.sub_grand_total')

{{-- Include this file in the cart_details.blade.php page --}}