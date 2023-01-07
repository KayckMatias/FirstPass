@extends('layouts.menu')

@section('title', $title)

@section('content')
        @foreach ($errors->all() as $error)
            <div class="tw-p-4 tw-mb-4 tw-text-sm tw-text-red-700 tw-bg-red-100 tw-rounded-lg" role="alert">
                <span class="tw-font-medium">{{ $error }}</span>
            </div>
        @endforeach

        @if (Session::has('message'))
            <div class="tw-p-4 tw-mb-4 tw-text-sm {{ Session::get('alert_type') }}  tw-rounded-lg" role="alert">
                <span class="tw-font-medium">{{ Session::get('message') }}</span>
            </div>
        @endif

        <div class="tw-p-6 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg">
            <div class="sm:tw-p-8">
                <h1 class="tw-text-xl tw-font-bold tw-leading-tight tw-tracking-tight tw-text-gray-900 md:tw-text-2xl">
                    Profile
                </h1>
                <form class="tw-space-y-4 md:tw-space-y-6" action="{{ route('profile.update', [$user->id]) }}"
                    method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Your
                            name</label>
                        <input type="name" name="name" id="name"
                            class="tw-bg-gray-50 tw-border @error('name') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                            placeholder="Your name" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="invalid-feedback tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="tw-bg-gray-50 tw-border @error('email') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                            placeholder="name@example.com" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="invalid-feedback tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" value="" autocomplete="new-password"
                            class="tw-bg-gray-50 tw-border @error('password') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5">
                        @error('password')
                            <span class="invalid-feedback tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-red-900"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="tw-flex tw-flex-col tw-items-center">
                        <button type="submit"
                            class="tw-w-100 tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
