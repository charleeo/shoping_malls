@extends('layouts.app')

@section('title','All products |')
@section('content')

  @foreach ($products as $product )

  <a href="{{route('products.show',['product'=>$product->id]) }}">{{$product->product_name}}</a>
      
  @endforeach
@endsection
