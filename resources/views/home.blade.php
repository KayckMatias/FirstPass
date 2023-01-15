@extends('layouts.menu')

@section('title', $title)

@section('content')

    @if (Session::has('message'))
        <div class="tw-p-4 tw-mb-4 tw-text-sm {{ Session::get('alert_type') }} tw-rounded-lg" role="alert">
            <span class="tw-font-medium">
                {{ Session::get('message') }}
            </span>
        </div>
    @endif

    @if (!auth()->user()->hasVerifiedEmail() && !Session::has('resended'))
        <div class="tw-p-4 tw-mb-4 tw-text-sm tw-text-red-700 tw-bg-red-100 tw-rounded-lg" role="alert">
            <span class="tw-font-medium">
                Your email has not yet been verified, to use our resources, activate your account by clicking the link sent
                in your email.
                <a href="{{ route('verification.resend') }}"
                    onclick="event.preventDefault();
        document.getElementById('resend-mail-form').submit();"
                    class="tw-ml-2 tw-text-sm tw-inline-block tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-2 tw-py-1 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Resend link</a>
            </span>
        </div>
        
        <form id="resend-mail-form" action="{{ route('verification.resend') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="tw-text-2xl tw-font-bold tw-tracking-tight tw-text-center">Favorite Passwords</p>
                <div class="row">
                    @forelse ($favorite_passwords as $password)
                        <div class="col-md-6 col-sm-12" style="margin-top: 0.5rem;">
                            <div
                                class="tw-w-full tw-p-6 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-flex tw-flex-col tw-items-center">
                                <a href="#">
                                    <h5
                                        class="tw-mb-2 tw-text-xl tw-font-bold tw-tracking-tight tw-text-gray-900 tw-text-center">
                                        {{ $password->password_name }}</h5>
                                </a>
                                <p class="tw-mb-3 tw-font-normal tw-text-gray-700 tw-text-center">
                                    {{ !empty($password->password_login) ? $password->password_login : 'No login info' }}
                                </p>
                                <a href="{{ route('passwords.validate', [$password->id]) }}"
                                    class="tw-inline-block tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">
                                    View Password
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="tw-text-lg tw-tracking-tight tw-text-center">No favorite passwords found :c</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
