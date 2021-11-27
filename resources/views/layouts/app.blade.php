<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hairy') }}</title>

    <!-- Scripts -->
@stack('scripts')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sign-in-up.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css')}}" rel="stylesheet">
    @stack('stylesheets')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            Toggle Sidebar
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Hairy') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-popper="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Hairy
                <img src="/img/logo.svg" alt="" width="30">
            </h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#">
                    <i class="bi bi-house"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-calendar3"></i>
                    Termine
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/logo.svg" alt="" width="20">
                    Angebote
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-person-circle"></i>
                    Profil
                </a>
            </li>
        </ul>
    </nav>

    <main class="py-4 content">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar, .content').toggleClass('active');
        });
    });
</script>
@stack('body-js')
</body>

</html>
