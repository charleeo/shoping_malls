@php
    $menus = [
    ['path'=>'/shops/create','text'=>'get started'],
    ['path'=>route('products.create'),'text'=>'create ads'],
    ['path'=>route('businesses'),'text'=>'shops'],
];
if(!Auth::user()){
    $menus[]=['path'=>route('login'),'text'=>'login'];
   $menus[]= ['path'=>route('login'),'text'=>'login'];
}else {
    $menus[]=['path'=>route('home'),'text'=>Auth::user()->name];
}

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
                    <a href="/shops/create" class="nav-link">
                        {{__('get Started')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link">
                        {{__('Products')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.create')}}" class="nav-link">
                        {{__('stock up')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('businesses')}}" class="nav-link">
                        {{__('business')}}
                    </a>
                </li>
                
            </ul>

            @foreach ($menus as $menu )
                 <a href="{{$menu['path']}}">{{$menu['text']}}</a>
            @endforeach

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @foreach ($menus as $menu )
                <li class="nav-item">
                    <a class="nav-link" href="{{$menu['path']}}">{{ $menu['text']}}</a>
                </li>
                @endforeach
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    {{-- <li class="nav-item"><a href="/second-register" class="nav-link">Get Started 2</a></li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        
    </nav>
