<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark shadow px-5">
    <a class="navbar-brand d-flex align-items-center" href="#">
        {{-- <img height="40" src="{{ asset('storage/cyberfolk-logo.png') }}" alt="Personal Logo"> --}}
        LOGO
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar-toggler -->

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endguest
            @auth
                <li class="nav-item dropdown">
                    <button id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                    </div>
                    <!-- dropdown-menu -->
                </li>
                <!-- dropdown -->
            @endauth
        </ul>
        <!-- navbar-nav Right -->
    </div>
    <!-- navbar-collapse -->
</nav>
