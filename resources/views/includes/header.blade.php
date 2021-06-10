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
 <script src="{{ asset('js/app.js') }}" defer></script>
 <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
     integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
 </script>
 <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
     integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
 </script>
 <script src="{{asset('js/main.js')}}" defer></script>
 <script src="{{asset('js/sidebar.js')}}" defer></script>
 <script src="{{asset('js/gallery.js')}}" defer></script>
</head>
