<!-- Sidebar -->

<div  class="sidebar-wrapper" id="sidebar-wrapper">
    <div class="my-sidebar-color" id="sidebar-menu-wrapper">
        <div class="sidebar-dropown">
            <div class="sidebar-menu side-parent-dropdown">
                Manage Shop <i class="fas fa-caret-down"></i>
                <div class="sidebar-dropdown-paranet">
                    <a href="{{route('shops')}}" class="sidebar-dropdwn-menu">Create</a>
                    <a href="{{route('shops.image')}}" class="sidebar-dropdwn-menu">Photo</a>
                    <a href="/" class="sidebar-dropdwn-menu">edit</a>
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




