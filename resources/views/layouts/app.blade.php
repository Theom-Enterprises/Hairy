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
    @auth
        <link href="{{ asset('css/sidebar.css')}}" rel="stylesheet">
    @endauth
    @stack('stylesheets')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-4" style="height: 55px">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Hairy') }}
        </a>
        @auth
            <button type="button" id="sidebarCollapse" class="btn" style="font-size: 1.125rem">
                <i class="bi bi-list"></i>
            </button>
        @endauth

        <div
            class="navbar-collapse"
            id="navbarSupportedContent">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" aria-expanded="false" href="#"
                           role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

@auth
    <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>
                    Dashboard
                </h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
                        <i class="bi bi-house-fill"></i>
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
                        <i class="bi bi-basket3-fill"></i>
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
    @endauth

    <main
        @auth
        class="content"
        @endauth>
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@guest
@else
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                // open or close navbar
                $('#sidebar, .content').toggleClass('active');
            });
        });
    </script>
@endguest
@stack('body-js')
</body>

</html>
