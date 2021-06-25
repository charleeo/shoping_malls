@extends('layouts.app')

@section('title', "Your number 1 online shopping malls and stores |")

@section('content')

{{-- <section class="hero">
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
        <a class="get-started"href="/products/create" >Begin</a>
    </div>
</section> --}}

<section class="hero">
   <div class="divs">
       <div class="welcome-message">
           <h1>AMAZING SHOPPING EXPERIENCE</h1>
           <p>We help redefine your online shopping process and simplify it for you</p>
       </div>
       <div class="svg">
           <img src="{{asset('images/fpc8.jpg')}}" alt="SVG">
       </div>
    </div>
    <div class="learn-more">
        <a href="/about">learn more</a>

    </div>
</section>



@include('pages.other_features')
<div class="mission-1 text-center">
        <div class='row justify-content-center '>
            <div class="col-md-6 col-sm-10">
                <h4 class='some-headers text-center'>Our Mission </h4>
                <img src="{{asset('images/fpc6.jpg')}}" alt="" class="img rounded-circle" width="300px">
                <p class=" mission-t">
                    We have a mandate to take your business of the street and to present it to a global audience who will in turn become your full time customers
                </p>
            </div>
        </div>
</div>
@include('pages.featured_products')



{{-- Featured shops --}}
@include('pages.featured_services')

<section class="mission">
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-10">
            <h4 class='some-headers'>Our  Story</h4>
            <p class="mss-text">
                It is obvious that so many people want to start selling some products either theirs of affiliates but are being held back due to lack of fianace for setting up a selling center or shop and those with shops don't always have access to a good number of potential customers. So we saw the need to bridge this gap between sellers and buyers.
            </p>
        </div>
    </div>
</section>

@include('pages.testomonial')

@endsection
