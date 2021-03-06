
<nav class="navbar navbar-expand-lg  default-bg" id='navbar'>
    @if(Auth::check() AND !Request::is('/') )
        <div class="toggler">
            <i class="fas fa-arrow-left nav-link-item "></i> <span>sidebar</span>
        </div>
    @endif
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
                <li class='nav-item'>
                    <a href="/cart" class="nav-link">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="basket-item-count">{{-- Cart count willbe here on page load--}} </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
