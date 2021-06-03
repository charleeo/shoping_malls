@php
    $menus = [
    ['path'=>'/shops/create','text'=>'get started'],
    ['path'=>route('products.create'),'text'=>'create ads'],
    ['path'=>route('businesses'),'text'=>'shops'],
    ['path'=>route('products.index'),'text'=>'Products'],
];
if(!Auth::user()){
    $menus[]=['path'=>route('register'),'text'=>'register'];
   $menus[]= ['path'=>route('login'),'text'=>'login'];
}else {
    $menus[]=['path'=>route('home'),'text'=>Auth::user()->name];
}

 $path ='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
 
@endphp

<nav class="navbar navbar-expand-lg  default-bg" id='navbar'>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('ASM') }}
        </a>
        <button class="navbar-toggler border-dark " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <span class="fa fa-bars text-secondary border-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav "> 
                <li class="nav-item">
                    <a href="/" 
                    class="nav-link {{ $_SERVER['REQUEST_URI']=='/'?'active':''}} ">Home</a>
                </li>     
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @foreach ($menus as $menu )
                <li class="nav-item">
                    <a href="{{$menu['path']}}"
                    class="nav-link {{$path==$menu['path']?'active':''}}" 
                    >{{ $menu['text']}}</a>
                </li>
                @endforeach
        </div>
    </nav>
