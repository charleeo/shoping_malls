<div class="product-business shadow-lg ">
    <h3 >Seller's Data</h3>
    <ul class="text-center border rounded p-5 ">
        <li class=" text-center">
            <img src="{{asset($product->shop->business_picture)}}" alt="{{$product->shop->business_name}}"
            class="rounded-circle business-image">
        </li>
        <hr>
        <li class=""> {{$product->shop->business_name}}</li>
        <hr>
        <li class="">
            <i class="fas fa-globe"></i>:  <a href="/{{$product->shop->business_domain}}">
                Visit page for more
            </a>
        </li>
        <hr>
        <li class="">
            <i class="fas fa-envelope"></i>: 
            <a href="mailto:{{$product->shop->business_email}}">
            {{$product->shop->business_email}}
        </a>
        <hr>
        </li>
        <li class="">
            <i class="fas fa-phone"></i>:  
            <a href="tel:{{$product->shop->business_phone_number}}">{{$product->shop->business_phone_number}}
            </a>
        </li>
        
    </ul>
</div>