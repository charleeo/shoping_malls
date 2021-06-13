<div class="cart-grand-total">
    <div class="grand-sub">
        <div class="sub">
         <small>Sub Total: &#8358; 
            <input type="text" value="{{number_format($grandTotal,2)}}" class="sub-total border-0" readonly/>
        </small>
         <hr>
         </div>
         <div class="grand">
             <small>Grand Total: &#8358; 
                 <input type="text" value="{{number_format($grandTotal,2)}}" class="grand-total border-0" readonly/> 
             </small>
             <hr>
         </div>
    </div>
    <div class="clear-cart">
        <a href="/cart/clear" class="btn btn-warning btn-sm empty-cart">
            Clear Cart
        </a>
    </div>
 </div>
<div class="row justify-content-center">
    <div class="proceed-to-payment col-md-6 col-sm-8">
        <button class="btn btn-primary btn-sm form-control">Proceed To Payment</button>
    </div>
</div>