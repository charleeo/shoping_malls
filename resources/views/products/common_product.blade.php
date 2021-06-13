<div class="products-details">
    <div class="product-images">
        @php ($images = explode('|',$product->product_images))
        <img class="images-class" src="{{asset($images[1])}}" alt="">
    </div>
    <div class="product-footer">
        <div class="product-prices-name">
            <div class="prices">
                <span class="prices">&#8358;<b>{{number_format($product->price)}}</b></span>
                <strike> @if($product->discount)
                &#8358;: {{$product->discount}}
                @endif
                </strike>
            </div>
            <div>
                <span class="name"><b>{{$product->product_name}}</b></span>
            </div>
        </div>
        <div class="details">
            <a href='{{route('products.show',["product"=>$product->id,"name"=>$product->product_name])}}?category={{$product->productCategory->id}}&shop={{$product->shop->id}}'class="details-link">
                View <i class="fas fa-eye"></i>
            </a>
        </div>
        <div class='add-cart pb-2 d-flex mt-2 '>
            <form action="" method="POST">
                @csrf
                <div class="row product_data">
                    <div class="col-md-5 col-sm-6">
                        <input type="number" name="quantity"
                        class=" qty border-0  rounded text-center" placeholder="qty:0" style="width: 100%" required
                        >
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button class="add-to-cart ">{{_('Add  Cart')}} <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                    <small class="response text-success pl-4  "></small>
                    <input  type="hidden" value="{{$product->id}}" name="product_id" class=" product_id">
                </div>
            </form>
        </div>
    </div>
</div>