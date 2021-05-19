@extends('layouts.app')

@section('title', "Home Page |")

@section('content')

<section class="hero">

    <div class="welcome-text">
        <h1>
           your #1 africa   shopping mall
        </h1>
    </div>
        <div class="img">
            <div class="div-1">
                <p>
                    there could be different sellers, different buyers or even different products but there can only be that single platform for all your needs
                </p>
                <p class="second-p">
                    shop for anything, anytime, and most importantly from anywhere
                </p>
            </div>
            <div>
                <button class='learn-more'>learn more</button>
                <button class="get-started"><a href="/register" class="text-white">get started</a></button>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-md-6 col-sm-12 form-group">
                    <input type="text" class="form-control"
                    placeholder="search for shops">
                </div>
                <div class="col-md-6 col-sm-12 form-group">
                    <input type="text" class="form-control"
                    placeholder="search for products">
                </div>
            </div>
        </form>
    </div>
</section>
 {{-- Featured shops --}}
@include('pages.featured_shops')
@include('pages.featured_products')
@include('pages.testomonial')

@endsection
