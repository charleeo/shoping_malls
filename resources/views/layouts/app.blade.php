@include('includes.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        <div class="container-flui">
            @include('includes.alert')
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
