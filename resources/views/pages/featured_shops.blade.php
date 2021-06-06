@if ($products)

<section class="featured-shops pt-4 bg-white">

        <h2 class="text-center">FEATURED SHOPS</h2>

    <div class="products-flex-deplay">
        @foreach ($shops as $shop )
        <div class="products-details">
               <div class="product-images">
                   <img class="images-class" src="{{asset($shop->business_picture)}}" alt="{{$shop->business_name}}">
                </div>
           <div class="product-prices-name">
               <div>
                   <h4 class="name"><b>{{$shop->business_domain}}</b></h4>
                </div>
            </div>
            <div class='add-cart shadow-lg p-2 mb-4'>
                <span class="quantitis">{{$shop->description}}</span>
            </div>
            <div class="details">
                <a href='/'class="details-link">View Page</a>
            </div>
        </div>
        @endforeach
    </section>

@endif
