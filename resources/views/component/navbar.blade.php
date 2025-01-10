<style>
    .navbar-nav .nav-item .nav-link.active {
        color: #ffffff !important;
        background-color: #007bff; 
        border-radius: 5px; 
    }

    /* Navbar Styles */
    .navbar {
        margin: 0;
        padding: 0;
    }

    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 15px; /* Jarak antar item navbar */
    }

    .navbar-nav .nav-item .nav-link {
        font-size: 16px; /* Ukuran font navbar */
        padding: 10px 15px; /* Padding untuk link navbar */
    }

    /* Dropdown Menu */
    .navbar-nav .nav-item.dropdown {
        position: relative;
    }

    .navbar-nav .nav-item.dropdown .dropdown-menu {
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .navbar-nav .nav-item .nav-link {
        text-decoration: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: column;
            gap: 10px;
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 14px;
        }
    }
</style>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container mt-2 mb-2">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'ConnectFriend') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- You can add more menu items here if needed -->
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
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
                @else
                <div class="d-flex align-items-center" style="gap: 10px">
                    
                    <!-- Active Page Logic -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('friend') ? 'active' : '' }}" href="{{ route('friend') }}">{{ __('Friends') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('shop') ? 'active' : '' }}" href="{{ route('shop') }}">{{ __('Shop') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('topup-coins') ? 'active' : '' }}" href="{{ route('topup-coins') }}">{{ __('Top Up Coins') }}</a>
                    </li>

                    <!-- Coins display -->
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color:black" href="#">
                            <span>Coins: </span> {{ Auth::user()->coins }}
                        </a>
                    </li>

                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('userSetting') }}">
                                {{ __('Visible') }}
                            </a>

                            <hr class="mt-1 mb-1">
                            
                            <a class="dropdown-item" href="{{ route('logout') }} "
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
