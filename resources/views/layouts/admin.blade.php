<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--  jQuery popper.js  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div id="app">
    <div class="tbg">
        <div class="theader">
            <nav class="navbar navbar-expand navbar-light bg-white">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth('admin')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                      @if (isset($admin))
                                        <a class="dropdown-item active" href="">
                                            {{ $admin->name}}
                                        </a>
                                      {{-- @endif --}}
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                      @endif

                                        <form method="POST" id="logout-form" action="{{ route('admin.logout') }}"  class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endauth
                        </ul>

                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="navbar-brand" href="{{ url('/admin') }}">
                                    <img src="https://worldvectorlogo.com/logos/tinder-1.svg" alt="Tinder Logo" title="Tinder Logo" style="width: 100px">
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('User Login') }}</a>
                                    </li>
                                @endif

                            {{-- @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('matches.index') }}">
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                    </a>
                                </li> --}}
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <x-flash-message status="session('status')" />

        <div class="tbgwrap">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
