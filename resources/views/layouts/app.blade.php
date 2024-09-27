<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Psicoalianza - Gestión de empleados') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            height: calc(100vh - 75px);
            position: fixed;
            top: 75px;
            left: 0;
            width: 250px;
            background-color: #005ebb;
            padding-top: 20px;
            overflow-y: auto;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .avatar {
            width: 3em;
            height: auto;
            margin-right: 5px;
        }

        .style-link {
            color: white;
            margin-left: 20px;
            margin-right: 20px;
            font-size: large;
        }

        .margin-top-navbar{
            margin-top: 75px;
        }

        .icon-menu {
            width: 3em;
            margin: 2em auto 3em;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav style="position: fixed;width: 100%;" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-color-xs-psicoalianza.webp') }}" alt="Logo Psicoalianza">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <!-- agregar ams aqui -->
                    </ul>

                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('img/avatar.webp') }}" class="avatar" alt="Avatar">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        @auth
            <div class="sidebar">
                <ul class="nav flex-column">
                    <img class="icon-menu" src="{{ asset('icons/icon-menu.png') }}" alt="menu">
                    <li class="nav-item">
                        <a class="nav-link style-link" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link style-link" href="{{ route('employees.index') }}">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link style-link" href="{{ route('employee-role.index') }}">Cargos</a>
                    </li>
                </ul>
            </div>
        @endauth


        <div class="content">
            <main class="py-4 margin-top-navbar">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
