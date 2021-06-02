@include('includes.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        @if(Auth::user() AND !Request::is('/') )
        <div class="toggler">
            <i class="fas fa-arrow-left fa-2x " style="color: #f3f1f799"></i> 
        </div>
        <div class="container-flui flex-content">
            <div  id="sidebar">
                @include('includes.sidebar')
            </div>
            <div class="main" id="main">
                @include('includes.alert')
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        @else 
        <div class="container-flui">
            <div>
                @include('includes.alert')
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        @endif
    </div>
</body>
</html>
