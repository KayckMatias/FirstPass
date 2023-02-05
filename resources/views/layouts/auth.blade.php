<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Autenticação</title>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/c5ccb061e9.js"></script>
    @vite(['resources/js/app.js', 'resources/js/custom.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>

@component('_components.preloader')
@endcomponent

<body id="app-layout" class="bg-light">
    @yield('content')
</body>

</html>
