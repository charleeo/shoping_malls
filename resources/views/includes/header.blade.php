<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Cahrles Otaru">
    <meta name="description" content="shopping malls, shopping world, shopping outlet,all products, shopping malls in nigeria, shopping malls in africa, #1 online shopping malls africans are shopping">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title','Shopping Malls|')  {{ config('app.name', 'Laravel') }}  </title>
    <link rel="icon" href="{{asset('images/icon/favicon.ico')}}" type="image/ico">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Source+Code+Pro:wght@300;400;900&display=swap" rel="stylesheet"> 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,700;1,200&family=Open+Sans+Condensed:wght@300&family=Source+Code+Pro:wght@300;400;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <!-- Scripts -->
</head>
