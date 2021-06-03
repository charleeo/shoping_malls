@if (isset($products))
    
<section class="featured-products shadow-lg py-4">
    <div class="shops-heading">
        <h2 class="featured">FEATURED PRODUCTS</h2>
        <small ><a href="/shops" class="shop-btn start-shop">Start Shopping</a></small>
    </div>
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
                <a href='{{route('products.show',["product"=>$product->id])}}'class="details-link">Details</a>
            </div>
            <div class='add-cart'>
               <span class="quantitis">{{isset($product->quantity)?$product->quantity." available":''}}</span>
               <small class="add-to-cart">{{_('Add to Cart')}} </small>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
{{-- <div class="shops-details">
    <div class="shops">
        <div class="shop-image">
            <img src="{{asset('assets/images/bg/shopping.jpg')}}" alt="shop name">
        </div>
        <div class="shop-description">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam beatae dicta accusantium modi, deserunt sequi perferendis neque porro maiores fuga sit, omnis id assumenda provident. Dicta eligendi tenetur quos iste.
            </p>
            <button class="details">Details</button>
        </div>
    </div>
    <div class="shops">
        <div class="shop-image">
            <img src="{{asset('assets/images/bg/shopping.jpg')}}" alt="shop name">
        </div>
        <div class="shop-description">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam beatae dicta accusantium modi, deserunt sequi perferendis neque porro maiores fuga sit, omnis id assumenda provident. Dicta eligendi tenetur quos iste.
            </p>
            <button class="details">Details</button>
        </div>
    </div>

    <div class="shops">
        <div class="shop-image">
            <img src="{{asset('assets/images/bg/shopping.jpg')}}" alt="shop name">
        </div>
        <div class="shop-description">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam beatae dicta accusantium modi, deserunt sequi perferendis neque porro maiores fuga sit, omnis id assumenda provident. Dicta eligendi tenetur quos iste.
            </p>
            <button class="details">Details</button>
        </div>
    </div>

    <div class="shops">
        <div class="shop-image">
            <img src="{{asset('assets/images/bg/shopping.jpg')}}" alt="shop name">
        </div>
        <div class="shop-description">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam beatae dicta accusantium modi, deserunt sequi perferendis neque porro maiores fuga sit, omnis id assumenda provident. Dicta eligendi tenetur quos iste.
            </p>
            <button class="details">Details</button>
        </div>
    </div>
</div> --}}
