<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Cahrles Otaru">
    <meta name="description" content="shopping malls, shopping world, shopping outlet,all products, shopping malls in nigeria, shopping malls in africa, #1 online shopping malls africans are shopping">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title','Shoppers world|')  {{ config('app.name', 'Laravel') }}  </title>
    <link rel="icon" href="{{asset('images/icon/favicon.ico')}}" type="image/ico">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <!-- Scripts -->
</head>
