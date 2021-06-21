@if (count($services) >0)
<section class="featured-products shadow-lg py-4">
        <h2 class="text-center">FEATURED SERVICES</h2>
    <div class="products-flex-deplay">
        @foreach ($services as $service )
         @include('services.common_services')
        @endforeach
    </div>
</section>
@endif



