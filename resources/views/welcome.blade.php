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
    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/menu.css'])
</head>

<body>
      <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
          <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Your safety first</h1>
            <p class="lead fw-normal">Guard your passwords with 3 levels of encrypted security</p>
            @guest
            <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
            <a class="btn btn-outline-secondary" href="{{ route('register') }}">Register</a>
            @endguest

            @auth
            <p class="lead fw-normal">Welcome back, {{ auth()->user()->name }}!</p>
            <a class="btn btn-outline-primary" href="{{ route('login') }}">Dashboard</a> 
            @endauth
          </div>
          <div class="product-device shadow-sm d-none d-md-block"></div>
          <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
      </main>
      
      <footer class="container py-4">
        <div class="row text-center">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">Kayck Matias &copy; 2022</small>
          </div>
        </div>
      </footer>      
</body>

</html>