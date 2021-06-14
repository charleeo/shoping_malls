@extends('layouts.app')

@section('title','smart and efficient service|')
@section('content')

<section class="products-page">
    <h1 class="text-center">Featured Services</h1>
<div class="products-flex-deplay">
     @foreach ($services as $service )
        @include('services.common_services')
    @endforeach
</div>
</section>

@endsection
