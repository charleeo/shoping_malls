@extends('layouts.app')
@section('title',$product->product_name." | ")
@section('content')

<section class="product-details-section py-2 ">

    <div class="row justify-content-center mb-5">
        {{-- First Column or gallery section --}}
        <div class="col-md-8 col-sm-10  p-5">
            <div class="gallery-slide row justify-content-center">
            {{-- Carousel Section --}}
            <div class="col-md-6 col-sm-12">
            <div class="carousel slide image-galery text-center" data-ride="carousel">
                @foreach ($images as $key=> $image)
                <div class="carousel-item {{$images[0]==$image?'active':''}}">
                    <div class="gallery-image-wrapper">
                        <img src="{{asset($image)}}"  alt="{{$product->product_name}}" width="100%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 col-sm-12  mb-5 p-4">
            <div class="row justify-content-center mb-3">
                @foreach ($images as $image )
                    <div class=" thumb-nails">
                        <img src="{{asset($image)}}" alt="{{$product->product_description}}"
                        class="rounded-circle my-gallery"
                        data-target="#galleryModal">
                    </div>
                    @endforeach
            </div>
            <div class=" pl-2">
                <hr>
                {{-- Name and category section --}}
                <h2 >Item:  <b>{{$product->product_name}}</b></h2>
                <h2 >Category: <b>{{$product->productCategory->product_category_name}}</b></h2>
                <hr>
            </div>
        </div>


            </div>
        </div>
        {{-- Details Section or second column--}}
        <div class="col-md-4 col-sm-10 p-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <p>Description: {{$product->product_description}}</p>

                    <ul class="list-group">
                        <li class="list-group-item">
                           price: &#8358;<b>{{number_format($product->price)}} </b>
                        </li>
                        <li class="list-group-item">
                            Quantities Available: <b>{{$product->quantity}} </b>
                         </li>
                         <li class="list-group-item">
                            Payment Conditions: <b>{{$product->delivery_status}} </b>
                         </li>
                         <li class="list-group-item">
                            Delivery Location <i class="fa fa-map-marker"></i> : <b>{{$product->location}} </b>
                         </li>
                         <li class="list-group-item">
                           <a href="#">Add To Cart <i class="fa fa-shopping-cart"></i> </a>
                         </li>
                         <li class="list-group-item">
                             <a href="#">Shere <i class="fa fa-share-alt"></i> </a>
                         </li>
                         <li class="list-group-item">
                            <a href="#">Add To Wishlist <i class="fa fa-heart"></i> </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Report This Item</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="product-business px-4">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-10">
                <h3>Seller's Data</h3>
                <ul class="list-group border-0 shadow">
                    <li class="list-group-item text-center">
                        <img src="{{asset($product->shop->business_picture)}}" alt="{{$product->shop->business_name}}"
                        class="rounded-circle business-image">
                    </li>
                    <li class="list-group-item">Name: {{$product->shop->business_name}}</li>
                    <li class="list-group-item">
                       <a href="/{{$product->shop->business_domain}}">
                          Visit page for more
                        </a>
                    </li>
                    <li class="list-group-item">Email Address:<a href="mailto:{{$product->shop->business_email}}">
                       {{$product->shop->business_email}}
                    </a>

                    </li>
                    <li class="list-group-item">
                        Phone: {{$product->shop->business_phone_number}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </section>
    @include('products.related_products')
    @include('products.create_by_same_seller');
    @include('includes.gallery-modal')
@endsection


