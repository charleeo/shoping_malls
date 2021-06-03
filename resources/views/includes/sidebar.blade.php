<!-- Sidebar -->

<div  class="sidebar-wrapper" id="sidebar-wrapper">
    <div class="my-sidebar-color" id="sidebar-menu-wrapper">
        <div class="sidebar-dropown">
            <div class="sidebar-menu side-parent-dropdown {{$path=='/shops/create'||$path=='/shops/create-photo'?'active':''}} ">
                Manage Shop <i class="fas fa-caret-down"></i>
                <div class="sidebar-dropdown-paranet">
                @foreach ($dropdown1 as $drop )
                    <a 
                    href="{{$drop['path']}}" 
                    class="sidebar-dropdwn-menu {{$path==$drop['path']?'active':''}} "
                    >
                    {{$drop['text']}}
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    <a href="{{route('products.create')}}" class="sidebar-menu">
        Side bar
    </a>
    <a href="{{route('products.create')}}" class="sidebar-menu">
        Side bar
    </a>
    <a href="{{route('products.create')}}" class="sidebar-menu">
        Side bar
    </a>
    <a href="{{route('products.create')}}" class="sidebar-menu">
        Side bar
    </a>

    <a class="sidebar-menu" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
</div>




