@if (count($products) >0)
<section class="featured-products shadow-lg py-4">
        <h2 class="text-center text-dark">FEATURED PRODUCTS</h2>
    <div class="products-flex-deplay">
        @foreach ($products as $product )
         @include('products.common_product')
        @endforeach
    </div>
</section>
@endif



