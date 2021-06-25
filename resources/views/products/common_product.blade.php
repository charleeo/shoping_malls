<div class="products-details mb-4 mx-2">
    <div class="product-images">
        <div class="product-header p-1">
            <h4>{{$product->product_name}}</h4>
        </div>
        @php ($images = explode('|',$product->product_images))
        <img class="images-class" src="{{asset($images[0])}}" alt="{{$product->product_name}}">
    </div>
    <div class="product-footer">
        <div class="product-prices-name">
            <div class="prices">
                <span class="prices">&#8358;<b>{{number_format($product->price)}}</b></span>
                <small style="font-size: 10px">
                    <strike> @if($product->discount)
                    &#8358;: {{$product->discount}}
                    @endif
                    </strike>
                </small>
            </div>
        </div>
        <div class="details">
            <a href='{{route('products.show',["product"=>$product->id,"name"=>$product->product_name])}}?category={{$product->productCategory->id}}&shop={{$product->shop->id}}'class=" details-link">
                View <i class="fas fa-eye"></i>
            </a>
        </div>
        <div class='add-cart pb-1  mt-2 '>
            <form action="" method="POST">
                @csrf
                <div class=" product_data ">
                    <div class="qty-section">
                        <div class="q">
                            <input type="number" name="quantity"
                            class=" qty border-0  px-1  " placeholder="qty:0">
                        </div>
                        <div class="c">
                            <button style="font-size: 10px" class="add-to-cart ">{{_('Add  Cart')}} <i class="fa fa-shopping-cart fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <input  type="hidden" value="{{$product->id}}" name="product_id" class=" product_id">
                    <div class="response pl-4  "></div>
                </div>
            </form>
        </div>
    </div>
</div>
