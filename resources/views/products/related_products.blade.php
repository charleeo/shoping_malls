
@if (($relatedItems) && !Auth::user())
<section class="realted-items bg-white pt-5">
    <h1 class="text-center">Related Items</h1>
    <div class="products-flex-deplay">
        @foreach ($relatedItems as $product )
        <div class="products-details">
            <div class="product-images">
                @php ($images = explode('|',$product->product_images))
                <img class="images-class" src="{{asset($images[1])}}" alt="">
            </div>
        <div class="product-prices-name">
            <div class="prices">
                <span class="prices">&#8358;<b>{{number_format($product->price)}}</b></span>
            </div>
            <div>
                <span class="name"><b>{{$product->product_name}}</b></span>
            </div>
        </div>
        <div class="details">
            <a href='{{route('products.show',["product"=>$product->id,"name"=>$product->product_name])}}?category={{$product->productCategory->id}}'class="details-link">Details</a>
        </div>

        <div class='add-cart'>
            <small class="add-to-cart">{{_('Add to Cart')}} <i class="fa fa-shopping-cart"></i> </small>
        </div>
    </div>
        @endforeach
    </div>
</section>
@endif



