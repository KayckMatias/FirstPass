<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/c5ccb061e9.js"></script>
    @vite(['resources/js/app.js', 'resources/js/custom.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/menu.css'])
</head>

<body class="bg-light">
    <div id="app">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">{{ config('app.name', 'Laravel') }}</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ (Str::contains(Request::route()->getName(), 'home')) ? 'active' : '' }}" href="{{route('home')}}">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ (Str::contains(Request::route()->getName(), 'categories')) ? 'active' : '' }}" href="{{route('categories.index')}}">Categories</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ (Str::contains(Request::route()->getName(), 'passwords')) ? 'active' : '' }}" href="{{route('passwords.index')}}">Passwords</a>
                </div>
                <footer class="sidebar-footer">
                    <small class="d-block mb-3 text-muted">Kayck Matias &copy; 2022</small>
                </footer>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <a href="javascript:void(0)" style="color: black;"><i class="fa fa-bars" aria-hidden="true" id="sidebarToggle"></i></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <main class="py-4">
                        <div class="container">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php $segments = ''; ?>
                                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>
                                    @foreach(Request::segments() as $segment)
                                    <?php $segments .= '/' . $segment; ?>
                                    <li class="breadcrumb-item"><a href="{{ url('/') . $segments }}">{{ $segment }}</a></li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>