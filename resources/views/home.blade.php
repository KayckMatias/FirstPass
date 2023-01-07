@extends('layouts.menu')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="tw-text-2xl tw-font-bold tw-tracking-tight tw-text-center">Favorite Passwords</p>
                <div class="row">
                    @forelse ($favorite_passwords as $password)
                        <div class="col-md-6 col-sm-12" style="margin-top: 0.5rem;">
                            <div
                                class="tw-max-w-sm tw-p-6 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow-md tw-flex tw-flex-col tw-items-center">
                                <a href="#">
                                    <h5 class="tw-mb-2 tw-text-2xl tw-font-bold tw-tracking-tight tw-text-gray-900 tw-text-center">
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
