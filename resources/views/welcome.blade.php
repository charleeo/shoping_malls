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
        <a class="get-started"href="/products/create" >Begin</a>
    </div>
</section>

@include('pages.other_features')
@include('pages.featured_products')


<section class="mission-1">
        <div class='row justify-content-center '>
            <div class="col-md-6 col-sm-10">
                <h4 class='some-headers'>Our Mission </h4>
                <p class=" mission-t">
                    We have a mandate to take your business of the street and to present it to a global audience who will in turn become your full time customers
                </p>
            </div>
        </div>
</section>

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
