<!--
    Name: Student Payment Center
    Created by: Elvis Blanco Gonzalez <eblanco@registrac.page>
    Initial release: August 27, 2020.
    Developer website: https://registrac.page
-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Student Payment Center') }} - URBE University</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="https://urbe.university/wp-content/uploads/2019/01/cropped-icon-32x32.jpg" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">

                @guest

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/urbe-logo-white.svg') }}" width="128" height="" alt="{{ config('app.name', 'Student Payment Center') }}" loading="lazy">
                    </a>

                @else

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{ asset('img/urbe-logo-white.svg') }}" width="128" height="" alt="{{ config('app.name', 'Student Payment Center') }}" loading="lazy">
                    </a>

                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a href="tel:+18447448723" class="nav-link">
                                    <i class="fas fa-phone-alt"></i>
                                    +1 (844) 744-8723
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailto:bursar@urbe.university" class="nav-link">
                                    <i class="fas fa-envelope-open"></i>
                                    {{_('bursar@urbe.university')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded px-3 mx-2 text-primary bg-warning" style="background-color: #082442" href="{{ route('login') }}">{{ __('Portal Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        @guest
            <footer class="w-100 bg-primary py-5 text-white">
                @include('layouts.footer')
            </footer>
        @endguest
    </div>
</body>
</html>