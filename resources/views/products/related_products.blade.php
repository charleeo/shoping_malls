@if(count($relatedItems) >0)
<section class="realted-items bg-white pt-5">
    <h1 class="text-center">Related Items</h1>
    <div class="products-flex-deplay">
        @foreach ($relatedItems as $product )
            @include('products.common_product')
        @endforeach
    </div>
</section>
@endif



