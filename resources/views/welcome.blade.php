@extends('layouts.app')

@section('title', "Home Page |")

@section('content')

<section class="hero">

    <div class="welcome-text">
        <h1 class="text-center">
           {{-- shoping experiance you will love --}}
           inovation for everyone
        </h1>
    </div>
        <div class="img">
            <div class="div-1" style="width: 100% !important">
                <p class="text-center" style="text-align: center !important">
                    {{-- there could be different sellers, different buyers or even different
                     products but there can only be that single platform for all your needs --}}
                     we are your inovation and entreprenureship hub 
                </p>
                <p class="second-p">
                    {{-- shop for anything, anytime, and most importantly from anywhere --}}
                </p>
            </div>
            <div>
                <button class='learn-more'>learn more</button>
                <button class="get-started"><a href="/create-account" class="text-white">get started</a></button>
            </div>
        </div>
    </div>
</section>
 {{-- Featured shops --}}
{{-- @include('pages.featured_shops')
@include('pages.featured_products')
@include('pages.testomonial') --}}

@endsection
