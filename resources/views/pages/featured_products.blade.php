@if (isset($products))
<section class="featured-products shadow-lg py-4">
        <h2 class="text-center text-dark">FEATURED PRODUCTS</h2>
    <div class="products-flex-deplay">
        @foreach ($products as $product )
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
                <a href='{{route('products.show',["product"=>$product->id,'name'=>$product->product_name])}}?category={{$product->productCategory->id}}&shop={{$product->shop->id}}'class="details-link">Details</a>
            </div>
            <div class='add-cart'>
               <small class="add-to-cart">{{_('Add to Cart')}} </small>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif



