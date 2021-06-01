@extends('layouts.app')

@section('title','smart and sharp product|')
@section('content')

  @foreach ($products as $product )

  <a href="{{route('products.show',['product'=>$product->id]) }}">{{$product->product_name}}</a>

  @endforeach
@endsection
