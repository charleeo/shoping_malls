<div class="card mb-4 ml-3">
    <div class="card-header bg-info">
        <h4 class="some-headers">
            <b>{{$service->service_name}}</b>
        </h4>
    </div>
    <div class="card-body">
        <div class="service_description hide">
            <p>
                {{$service->service_description}}
            </p>
        </div>
        <div class="products-details">
            <div class="product-images">
                @php ($images = explode('|',$service->service_images))
                <img class="images-class" src="{{asset($images[0])}}" alt="{{$service->service_name}}">
            </div>
        </div>
    </div>
    <div class="product-footer card-footer bg-secondary">
        <div class="product-prices-name">
            <div class="prices">
                <h2 class="prices">&#8358;<b>{{number_format($service->price)}}</b></h2>
            </div>
        </div>
        <div class="details">
            <a href='{{route('services.show',["service"=>$service->id,"name"=>$service->service_name])}}?shop={{$service->shop->id}}'class="details-link btn btn-warning service_details">
                Details <i class="fas fa-eye"></i>
            </a>
        </div>
    </div>
</div>