@extends('layouts.app')
@section('title',$product->product_name." | ")

@section('content')

<section class="product-details-page">
    <div class="carousel slide image-galery" data-ride="carousel">
        @foreach ($images as $key=> $image)
        <div class="carousel-item {{$images[0]==$image?'active':''}}">
            <div class="gallery-slide">
                <div class="gallery-image-wrapper">
                    <img src="{{asset($image)}}"  alt="{{$product->product_name}}">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </section>


@endsection
