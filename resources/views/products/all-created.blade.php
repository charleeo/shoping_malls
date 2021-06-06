@extends('layouts.app')

@section('title','smart and sharp product|')
@section('content')

<section class="products-page">
    <h1 class="text-center">Featured Products</h1>
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
            <a href='{{route('products.show',["product"=>$product->id,"name"=>$product->product_name])}}'class="details-link">Details</a>
        </div>
        <div class='add-cart'>
            <span class="btn btn-default btn-sm">Send front</span>
            <a href="{{route('products.edit',['id'=>$product->id])}}" class=" btn btn-primary btn-sm">{{_('Edit')}} </a>
        </div>
    </div>
    @endforeach
</div>
</section>

@endsection

