@extends('layouts.auth')

@section('content')
    <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-6 tw-py-8 tw-mx-auto tw-h-screen lg:tw-py-0">
        <a href="{{ route('welcome') }}" class="tw-flex tw-items-center tw-mb-6 tw-text-2xl tw-font-semibold tw-tracking-widest tw-text-gray-900 tw-uppercase tw-rounded-lg focus:tw-outline-none focus:tw-shadow-outline">
            First Pass
        </a>
        <div class="tw-w-full tw-bg-white tw-rounded-lg tw-shadow-md md:tw-mt-0 sm:tw-max-w-md xl:tw-p-0">
            <div class="tw-p-6 tw-space-y-4 md:tw-space-y-6 sm:tw-p-8">
                <h1 class="tw-text-xl tw-font-bold tw-leading-tight tw-tracking-tight tw-text-gray-900 md:tw-text-2xl">
                    Create your account
                </h1>
                <form class="tw-space-y-4 md:tw-space-y-2" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="name" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Your
                            name</label>
                        <input type="text" name="name" id="name"
                            class="tw-bg-gray-50 tw-border @error('name') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-1.5"
                            placeholder="Your Name" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="tw-bg-gray-50 tw-border @error('email') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-1.5"
                            placeholder="name@example.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Password</label>
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
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Confirm Your
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
                    <div>
                        <label for="pin_password"
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">PIN Password</label>
                        <input type="password" inputmode="numeric" minlength="6" maxlength="6" name="pin_password" id="pin_password" placeholder="123456"
                            class="tw-bg-gray-50 tw-border @error('pin_password') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-1.5"
                             required>
                        <small id="pin_passwordHelp" class="tw-text-[10px] tw-text-gray-500 text-muted">ATTENTION: THIS PIN IS NOT CHANGEABLE AND
                            IS
                            NECESSARY TO VIEW YOUR PASSWORDS, <strong>DO NOT LOSE IT!</strong></small>
                        @error('pin_password')
                            <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="tw-w-full tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Sign up</button>
                    <p class="tw-text-sm tw-font-light tw-text-gray-500">
                        Already have an account? <a href="{{ route('login') }}"
                            class="tw-font-medium tw-text-indigo-600 hover:tw-underline">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
