<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hairy ● @yield('subtitle')</title>

    <!-- Scripts -->
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hairy.css') }}" rel="stylesheet">
    @auth
        <link href="{{ asset('css/sidebar.css')}}" rel="stylesheet">
    @endauth
    @stack('stylesheets')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-0">
        <div class="container-fluid mx-5">
            @auth
                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="bi bi-layout-sidebar" style="font-size: 1.3rem;"></i>
                </button>
            @endauth
            <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.svg" alt="" width="56" height="56"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right Side of Navbar (Links) -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest('web')
                        @guest('employee')
                            @if(!(Request::is('admin') || Request::is('admin/login')))
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Anmelden') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                                    </li>
                                @endif
                            @else
                                @if (Route::has('admin.login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Anmelden') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('home'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                @endif
                            @endif
                        @endguest
                    @endguest

                    @if(Auth::guard('employee')->user() !== null)
                        @include('includes.admin_nav_dropdown')
                    @elseif(Auth::guard('web')->user() !== null)
                        @include('includes.user_nav_dropdown')
                    @endif
                </ul>
            </div>
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
                    <a href="{{route('home')}}">
                        <i class="bi bi-house-fill"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('terminbuchung')}}">
                        <i class="bi bi-calendar3"></i>
                        Termine buchen
                    </a>
                </li>
                <li>
                    <a href="{{route('angebot.show')}}">
                        <i class="bi bi-basket3-fill"></i>
                        Angebote
                    </a>
                </li>
                <li>
                    <a href="{{route('profil.show')}}">
                        <i class="bi bi-person-circle"></i>
                        Profil
                    </a>
                </li>
            </ul>
        </nav>
    @endauth

        <main class="mainContent @auth content @endauth">
            @yield('content')
        </main>
</div>

<footer class="flex-shrink-0">
    <div class="container-fluid text-muted text-center">
        <span>Made in Austria with love</span>
        <p class="mt-1 mb-3">&copy; Hairy 2021–2022</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
@auth
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                // open or close navbar
                $('.content, #sidebar ').toggleClass('active');
            });
        });
    </script>
@endauth
</body>
</html>
