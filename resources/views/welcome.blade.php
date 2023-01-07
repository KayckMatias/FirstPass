<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/c5ccb061e9.js"></script>
    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/css/menu.css'])
</head>

<body class="bg-light">
    <main>
        <div class="tw-relative tw-px-6 tw-px-8">
            <div class="tw-mx-auto tw-max-w-3xl tw-pt-20 tw-pb-32 sm:tw-pt-48 sm:tw-pb-40">
                <div>
                    <div class="tw-mb-8 tw-flex tw-justify-center">
                        <div
                            class="tw-relative tw-overflow-hidden tw-rounded-full tw-py-1.5 tw-px-4 tw-text-sm tw-leading-6 tw-ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                            <span class="tw-text-gray-600">
                                Check this project in Github. <a target="_blank"
                                    href="https://github.com/KayckMatias/FirstPass"
                                    class="tw-font-semibold tw-text-indigo-600"><span class="tw-absolute tw-inset-0"
                                        aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                            </span>
                        </div>
                    </div>
                    <div>
                        <h1 class="tw-text-4xl tw-font-bold tw-tracking-tight tw-text-center tw-text-6xl">Your
                            safety
                            first</h1>
                        <p class="tw-mt-6 tw-text-lg tw-leading-8 tw-text-gray-600 tw-text-center">Guard your
                            passwords
                            with 3 levels of encrypted security</p>
                        <div class="tw-mt-8 tw-flex tw-gap-x-4 tw-justify-center">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="tw-inline-block tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                    class="tw-inline-block tw-rounded-lg tw-transition-all tw-duration-200 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-gray-900 tw-ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                    Register
                                </a>
                            @endguest

                            @auth
                                <p class="tw-inline-block tw-py-1.5 tw-text-lg tw-leading-8 tw-text-gray-600 tw-text-center">Welcome back,
                                    {{ auth()->user()->name }}!</p>
                                <a href="{{ route('home') }}"
                                    class="tw-inline-block tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">
                                    Dashboard
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="fixed-bottom text-center">
        <small class="d-block mb-3 text-muted">Kayck Matias &copy; 2022</small>
    </footer>
</body>

</html>
