@extends('layouts.app')
@section('title',$service->service_name." | ")
@section('content')

<section class="product-details-section py-2">
    @include('ads_type.common_heading')
    <div class="row justify-content-center mb-5">
        {{-- First Column or gallery section --}}
        <div class="col-md-7 col-sm-10  px-5">
            <div class="gallery-slide row justify-content-center">
            {{-- Carousel Section --}}
            <div class="col-md-7 col-sm-12 mb-4">
            <div class="carousel slide image-galery text-center" data-ride="carousel">
                @foreach ($images as $key=> $image)
                <div class="carousel-item {{$images[0]==$image?'active':''}}">
                    <div class="gallery-image-wrapper">
                        <img src="{{asset($image)}}"  alt="{{$service->service_name}}" width="100%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-5 col-sm-12 thumb-nails">
            @foreach ($images as $image )
                <img src="{{asset($image)}}" alt="{{$service->service_description}}"
                    class="rounded-circle my-gallery"
                    data-target="#galleryModal">
            @endforeach
        </div>
        </div>
    </div>
        {{-- Details Section or second column--}}
    <div class="col-md-5 col-sm-10 p-4">
            <div class="card border-0">
                <div class="card-body">
                    <h3 class="pl-3">
                        <b>{{$service->service_name}}</b>
                    </h3>
                    <small class="pl-3">Rating: <i class="fas fa-star text-warning"></i> </small>
                    <div class="pl-3 d-flex mt-4">
                      <h2 class="mr-4">
                          &#8358;: <b>{{number_format($service->price)}} 
                        </b>  
                      </h2> 
                      <p>
                        <strike> @if($service->discount)
                            &#8358;: {{$service->discount}}
                            @endif
                        </strike>
                      </p>
                    </div>
                    <div class="cart pl-3">
                        <form action="" method="POST">
                            @csrf
                            <div class="row service_data">
                                <div class="col-md-3 col-sm-5 p-3">
                                    <input type="number" name="quantity" class="form-control qty" placeholder="qty">
                                </div>
                                <div class="col-md-5 col-sm-5 p-3">
                                    <button class="btn add-to-cart btn-primary">Add to cart <i class="fas fa-shopping-cart"></i> </button> <br> <br>
                                    <small class="response   "></small>
                                </div>
                               
                                {{-- Response willbe here --}}
                                <input type="hidden" value="{{$service->id}}" class="service_id" name="service_id">
                            </div>
                        </form>
                    </div>
                    <hr>
                    <p class="p-3  mt-3">Description: {{$service->service_description}}</p>
                    <hr>

                    <h6 class="mt-4">
                       Location <i class="fa fa-map-marker"></i> : <b>{{$service->service_location}} </b>
                    </h6>
                     <hr>
                    <ul class="">
                         <li class=" text-center">
                             <a href="#"><i class="fa fa-share-alt mr-3"></i> </a>
                             <a href="#"><i class="fa fa-heart mr-3"></i> </a>
                             <a href="#">Report </a>
                         </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      {{-- @include('products.seller_data') --}}
    </section>
    {{-- @include('services.related_products')
    @include('products.create_by_same_seller');
    @include('includes.gallery-modal') --}}
@endsection


