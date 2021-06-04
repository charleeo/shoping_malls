@extends('layouts.app')

@section('title', "Your number online malls and stores |")

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
        {{-- <p class="second-p">
            shop for anything, anytime, and most importantly from anywhere
        </p> --}}
    </div>
    <div id="learnmore-div">
        <a  href='#'class='learn-more'>learn more</a>
        <a class="get-started"href="/register" >get started</a>
    </div>
</section>

@include('pages.other_features')
@include('pages.featured_shops')

<section class="business-model pt-4">
    <h2>What Are You Selling?</h2> <hr>
    <div class="different-models ">
    <p>
        Your business model is could be a barrier in the past, but now, anything you have for sales or any service you have to render has a shop for it.
        Quickly put that your shop or business on line at a button click
    </p>
        <div class="model-row ">
            <div class="">
                <img src='{{asset('assets/images/general/market1.jpg')}}'class='models-images'/>
            </div>
            <div class="">
                <img src='{{asset('assets/images/general/farm1.jpg')}}'class='models-images'/>
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
 {{-- Featured shops --}}
@include('pages.featured_products')
@include('pages.testomonial')

@endsection
