<form action="" method="POST">
    @csrf
    <div class="input-group quantity cartpage">
        <div class="input-group-append increment-btn changeQuantity " style="cursor: pointer">
            <span class="input-group-text">+</span>
        </div>
        <input type="text" class="qty-input border-0  "   readonly value="{{ $data['item_quantity'] }}"
        name="quantity">
        <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
            <span class="input-group-text">-</span>
        </div>
        <input type="hidden" value="{{$data['item_id']}}" name="product_id" class="product_id">
        <span class="response text-success pl-3"></span>
    </div>
</form>

{{-- This file is just to be included in the main cart detail page --}}