<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Logo -->
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="https://ec.com.pk/assets/img/logo.svg" class="block h-10 w-auto fill-current" alt="">
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Primary Navigation Menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link " href="/dashboard" :active="request() - > routeIs('dashboard')"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __('Dashboard') }}
                </a>
            </li>
            @if (Auth::user()->hasRole('user'))
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('dashboard.myprofile')" :active="request()->routeIs('dashboard.myprofile')">
                    {{ __('My Profile') }}
                </x-nav-link>
            </div> --}}
                <li class="nav-item">
                    <a class="nav-link " href="/complaint" :active="request() - > routeIs('complaint')">
                        {{ __('Complaint') }}
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link " href="/complaints" :active="request() - > routeIs('complaints')">
                        {{ __('Complaints') }}
                    </a>
                </li>
            @endif
        </ul>

        <div class="nav-item dropdown my-2  my-lg-0 ">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}

            </a>
            <form method="POST" action="{{ route('logout') }}" class="dropdown-menu">
                @csrf
                @if (Auth::user()->hasRole('user'))
                    <x-dropdown-link class="dropdown-item" :href="route('dashboard.myprofile')">
                        {{ __('My Profile') }}
                    </x-dropdown-link>
                @endif
                <x-dropdown-link class="dropdown-item" :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>

        </div>


    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</div>
</nav>
