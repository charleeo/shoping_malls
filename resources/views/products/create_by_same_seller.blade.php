@if(count($createdBySameSeller) >0) 
<section class="realted-items pt-5">
    <h1 class="text-center">Items By Same Seller</h1>
    <div class="products-flex-deplay">
        @foreach ($createdBySameSeller as $product )
          @include('products.common_product')
        @endforeach
    </div>
</section>
@endif



