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
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/css/menu.css'])
</head>
<div x-data="{ sidebarOpen: false }">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="tw-relative tw-z-40 md:tw-hidden" :class="{ 'tw-hidden': !sidebarOpen }" role="dialog" aria-modal="true">
        <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.
  
        Entering: "tw-transition-opacity tw-ease-linear tw-duration-300"
          From: "tw-opacity-0"
          To: "tw-opacity-100"
        Leaving: "tw-transition-opacity tw-ease-linear tw-duration-300"
          From: "tw-opacity-100"
          To: "tw-opacity-0"
      -->
        <div class="tw-fixed tw-inset-0 tw-bg-gray-600 tw-bg-opacity-75"></div>

        <div class="tw-fixed tw-inset-0 tw-z-40 tw-flex">
            <!--
          Off-canvas menu, show/hide based on off-canvas menu state.
  
          Entering: "tw-transition tw-ease-in-out tw-duration-300 tw-transform"
            From: "tw--translate-x-full"
            To: "tw-translate-x-0"
          Leaving: "tw-transition tw-ease-in-out tw-duration-300 tw-transform"
            From: "tw-translate-x-0"
            To: "tw--translate-x-full"
        -->
            <div class="tw-relative tw-flex tw-w-full tw-max-w-xs tw-flex-1 tw-flex-col tw-bg-white tw-pt-5 tw-pb-4">
                <!--
            Close button, show/hide based on off-canvas menu state.
  
            Entering: "tw-ease-in-out tw-duration-300"
              From: "tw-opacity-0"
              To: "tw-opacity-100"
            Leaving: "tw-ease-in-out tw-duration-300"
              From: "tw-opacity-100"
              To: "tw-opacity-0"
          -->
                <div class="tw-absolute tw-top-0 tw-right-0 tw--mr-12 tw-pt-2">
                    <button type="button" @click="sidebarOpen = !sidebarOpen"
                        class="tw-ml-1 tw-flex tw-h-10 tw-w-10 tw-items-center tw-justify-center tw-rounded-full focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-white">
                        <span class="tw-sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="tw-h-6 tw-w-6 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="tw-flex tw-flex-shrink-0 tw-items-center tw-px-4">
                    <a href="#"
                        class="tw-text-lg tw-font-semibold tw-tracking-widest tw-text-gray-900 tw-uppercase tw-rounded-lg focus:tw-outline-none focus:tw-shadow-outline">First
                        Pass</a>
                </div>
                <div class="tw-mt-5 tw-h-0 tw-flex-1 tw-overflow-y-auto">
                    <nav class="tw-flex-grow md:tw-block tw-px-4 tw-pb-4 md:tw-pb-0 md:tw-overflow-y-auto">
                        <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'home') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }}  tw-rounded-lg hover:tw-text-indigo-600"
                            href="{{ route('home') }}">Home</a>
                        <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'categories') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }} tw-rounded-lg hover:tw-text-indigo-600"
                            href="{{ route('categories.index') }}">Categories</a>
                        <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'passwords') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }} tw-rounded-lg hover:tw-text-indigo-600"
                            href="{{ route('passwords.index') }}">Passwords</a>
                    </nav>
                </div>
            </div>

            <div class="tw-w-14 tw-flex-shrink-0" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="tw-hidden md:tw-fixed md:tw-inset-y-0 md:tw-flex md:tw-w-64 md:tw-flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div
            class="tw-flex tw-flex-grow tw-flex-col tw-overflow-y-auto tw-border-r tw-border-gray-200 tw-bg-white tw-pt-5">
            <div class="tw-flex tw-flex-shrink-0 tw-items-center tw-px-4">
                <a href="#"
                class="tw-text-lg tw-font-semibold tw-tracking-widest tw-text-gray-900 tw-uppercase tw-rounded-lg focus:tw-outline-none focus:tw-shadow-outline">First
                Pass</a>
            </div>
            <div class="tw-mt-5 tw-flex tw-flex-grow tw-flex-col">
                <nav class="tw-flex-grow md:tw-block tw-px-4 tw-pb-4 md:tw-pb-0 md:tw-overflow-y-auto">
                    <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'home') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }}  tw-rounded-lg hover:tw-text-indigo-600"
                        href="{{ route('home') }}">Home</a>
                    <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'categories') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }} tw-rounded-lg hover:tw-text-indigo-600"
                        href="{{ route('categories.index') }}">Categories</a>
                    <a class="tw-block tw-px-4 tw-py-2 tw-mt-2 tw-text-sm tw-font-semibold {{ Str::contains(Request::route()->getName(), 'passwords') ? 'tw-bg-gray-200 tw-text-indigo-600' : 'tw-bg-transparent tw-text-gray-900' }} tw-rounded-lg hover:tw-text-indigo-600"
                        href="{{ route('passwords.index') }}">Passwords</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="tw-flex tw-flex-1 tw-flex-col md:tw-pl-64">
        <div class="tw-sticky tw-top-0 tw-z-10 tw-flex tw-h-16 tw-flex-shrink-0 tw-bg-white tw-border-b tw-border-gray-200 ">
            <button type="button"
                class="tw-border-r tw-border-gray-200 tw-px-4 tw-text-gray-500 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-indigo-500 md:tw-hidden"
                @click="sidebarOpen = !sidebarOpen">
                <span class="tw-sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/bars-3-bottom-left -->
                <svg class="tw-h-6 tw-w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>
            </button>
            <div class="tw-flow-root tw-flex-1 tw-mt-3.5 tw-justify-between tw-px-4">
                <div class="tw-ml-4 tw-float-right tw-mr-4 md:tw-ml-6">
                    <!-- Profile dropdown -->
                    <div class="tw-relative tw-ml-3">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-end tw-font-normal tw-bg-white tw-divide-y tw-divide-gray-100 tw-rounded"
                                    aria-labelledby="navbarDropdown">
                                    <ul class="tw-py-1 tw-text-sm tw-text-gray-700"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('profile') }}"
                                                class="tw-block tw-px-4 tw-py-2 tw-text-gray-700 hover:tw-text-indigo-600">Profile</a>
                                        </li>
                                    </ul>
                                    <div class="tw-py-1">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                            class="tw-block tw-px-4 tw-py-2 tw-text-sm tw-text-gray-700 hover:tw-text-indigo-600">Sign
                                            out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <body class="bg-light">
            <main class="tw-py-4">
                    <div class="container">
                        <!-- Breadcrumb -->
                        <nav class="tw-flex tw-mb-6 tw-px-5 tw-py-3 tw-text-gray-700 tw-border tw-border-gray-200 tw-rounded-lg tw-bg-gray-50"
                            aria-label="Breadcrumb">
                            <ol class="tw-inline-flex tw-items-center tw-space-x-1 md:tw-space-x-3">
                                <li class="tw-inline-flex tw-items-center">
                                    <a href="{{ route('home') }}"
                                        class="tw-inline-flex tw-items-center tw-text-sm tw-font-medium tw-text-gray-700 hover:tw-text-blue-600">
                                        <svg aria-hidden="true" class="tw-w-4 tw-h-4 tw-mr-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <?php $segments = ''; ?>
                                </li>
                                @foreach (Request::segments() as $segment)
                                    <?php $segments .= '/' . $segment; ?>
                                    <li>
                                        <div class="tw-flex tw-items-center">
                                            <svg aria-hidden="true" class="tw-w-6 tw-h-6 tw-text-gray-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <a href="{{ url('/') . $segments }}"
                                                class="tw-ml-1 tw-text-sm tw-font-medium tw-text-gray-700 hover:tw-text-blue-600 md:tw-ml-2 tw-capitalize">{{ $segment }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                    <div class="container">
                        <!-- Replace with your content -->
                        @yield('content')
                        <!-- /End replace -->
                    </div>
            </main>
        </body>
    </div>
</div>

</html>
