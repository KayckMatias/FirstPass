@extends('layouts.auth')

@section('content')
    <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-6 tw-py-8 tw-mx-auto tw-h-screen lg:tw-py-0">
        <a href="{{ route('welcome') }}" class="tw-flex tw-items-center tw-mb-6 tw-text-2xl tw-font-semibold tw-tracking-widest tw-text-gray-900 tw-uppercase tw-rounded-lg focus:tw-outline-none focus:tw-shadow-outline">
            First Pass
        </a>

        @if (Session::has('message'))
        <div class="tw-p-4 tw-mb-4 tw-text-sm {{ Session::get('alert_type') }}  tw-rounded-lg" role="alert">
            <span class="tw-font-medium">
                {{ Session::get('message') }}
            </span>
        </div>
        @endif

        <div class="tw-w-full tw-bg-white tw-rounded-lg tw-shadow-md md:tw-mt-0 sm:tw-max-w-md xl:tw-p-0">
            <div class="tw-p-6 tw-space-y-4 md:tw-space-y-6 sm:tw-p-8">
                <h1 class="tw-text-xl tw-font-bold tw-leading-tight tw-tracking-tight tw-text-gray-900 md:tw-text-2xl">
                    Reset Your Password
                </h1>
                <form class="tw-space-y-4 md:tw-space-y-6" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div>
                        <label for="email" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}"
                            class="tw-bg-gray-50 tw-border @error('email') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                            placeholder="name@example.com" required>
                        @error('email')
                            <span class="invalid-feedback tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">New Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="tw-bg-gray-50 tw-border @error('password') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-1.5"
                            required>
                        @error('password')
                            <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation"
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Confirm Your New
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="••••••••"
                            class="tw-bg-gray-50 tw-border @error('password_confirmation') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-1.5"
                            required>
                        @error('password_confirmation')
                            <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="tw-w-full tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Update Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection