@extends('layouts.app')

@section('title', "Your number 1 online shopping malls and stores |")

@section('content')

<section class="hero">
    <h1 class="welcome-text">
        shoping experiance you will love
    </h1>
    <div class="pitch">
        <p>
            there could be different sellers, different buyers or even different products but there can only be that single platform for all your needs
            shop for anything, anytime, and most importantly from anywhere
        </p>
    </div>
    <div id="learnmore-div">
        <a  href='#'class='learn-more'>learn more</a>
        <a class="get-started"href="/register" >get started</a>
    </div>
</section>

@include('pages.other_features')
@include('pages.featured_shops')

<hr>
<section class="other_features bg-white">
    <div class="wrapper-for-other-fearture">
        <div class='card '>
            <div class="card-body">
                <h4 class="text-center">Our Mission</h4>
                <p class="text-dark">
                    We have made a it point of duty to make your business thrive. This is why we have to always put and your business first by putting your in front of the world. The world will always to get the notice whatsoever your have to sell or offer.
                </p>
                <p>
                    So if got a business, bring it here let's sell it and resell it and keep selling it.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Featured shops --}}
@include('pages.featured_products')
{{-- <section class="business-model pt-4">
    <h2 class="pt-4">What Are You Selling?</h2> <hr>
    <div class="different-models ">
    <p class="pb-5">
        Your business model  could be a barrier in the past, but now, anything you have for sales or any service you have to render has a shop for it.
        Quickly put that your shop or business online at a button click
        <a href="{{route('shops')}}" target="parent">Get Started</a>
    </p>
        <div class="model-row ">
            <div class="">
                <img src='{{asset('assets/images/general/market1.jpg')}}'class='models-images'/>
            </div>
            <div class="">
                <img src='{{asset('assets/images/bg/image3.jpg')}}'class='models-images'/>
            </div>
        </div>
        <div class="model-row  ">
            <div class="">
                <img src='{{asset('assets/images/general/market2.jpg')}}'class='models-images'/>
            </div>
            <div class="">
                <img src='{{asset('assets/images/general/barber1.jpg')}}'class='models-images'/>
            </div>
        </div>
    </div>
</section>

<hr> --}}
<section class="other_features bg-white">
    <div class="wrapper-for-other-fearture">
        <h4 class="text-center">Our Short Story</h4>
        <p>
            We have made a point of duty to make your business thrive. This is why we have to always put and your business first by putting your in front of the world. The world will always to get the notice whatsoever your have to sell or offer.
        </p>
        <p>
            So if got a business, bring it here let's sell it and resell it and keep selling it.
        </p>
    </div>
</section>
<hr>
@include('pages.testomonial')

@endsection
