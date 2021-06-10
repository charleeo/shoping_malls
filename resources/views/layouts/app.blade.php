@include('includes.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        @if(Auth::user() AND !Request::is('/') )
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
        @include('includes.footer')
        @else
        <div class="container-flui">
            <div>
                @include('includes.alert')
                <main>
                    @yield('content')
                </main>
            </div>
            @include('includes.footer')
        </div>
        @endif
    </div>
</body>
</html>
