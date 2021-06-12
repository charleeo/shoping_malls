@extends('layouts.app')

@section('title','smart and sharp product|')
@section('content')

<section class="products-page">
    <h1 class="text-center">Featured Products</h1>
<div class="products-flex-deplay">
     @foreach ($products as $product )
        @include('products.common_product')
    @endforeach
</div>
</section>

@endsection
