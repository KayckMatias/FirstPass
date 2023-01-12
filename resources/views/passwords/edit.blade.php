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
        <h5 class="tw-mb-3 tw-text-xl tw-font-bold tw-tracking-tight tw-text-gray-900 tw-text-left">
            {{ __('Password - #' . $password->id) }}</h5>
        <form class="tw-space-y-4 md:tw-space-y-6" action="{{ route('passwords.update', [$password->id]) }}" method="post">
            @csrf
            @method('PATCH')
            <div>
                <label for="category_id" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Category</label>
                <select id="category_id" name="category_id"
                    class="tw-bg-gray-50 tw-border @error('category_id') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                    required>
                    <option value="">Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $password->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-red-900" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password_name" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Password Name</label>
                <input type="text" name="password_name" id="password_name" placeholder="Nubank"
                    value="{{ $password->password_name }}"
                    class="tw-bg-gray-50 tw-border @error('password_name') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                    required>
                @error('password_name')
                    <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password_login" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Login Info</label>
                <input type="text" name="password_login" id="password_login" placeholder="email@example.com"
                    value="{{ $password->password_login }}"
                    class="tw-bg-gray-50 tw-border @error('password_login') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5">
                @error('password_login')
                    <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Your Password</label>
                <input type="text" placeholder="Forbidden"
                    class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                    disabled>
                <small class="tw-text-[10px] tw-text-gray-500 text-muted">For you security, the password as not
                    editable, if you change or wrong the password, create a new password.</small>
            </div>
            <div>
                <div class="tw-relative tw-flex tw-items-start">
                    <div class="tw-flex tw-h-5 tw-items-center">
                        <input id="is_favorite" name="is_favorite" type="checkbox" value="1"
                            class="tw-h-4 tw-w-4 tw-rounded tw-border-gray-300 tw-text-indigo-600 focus:tw-ring-indigo-500 tw-cursor-pointer" {{ $password->is_favorite == 1 ? 'checked' : '' }}>
                    </div>
                    <div class="tw-ml-3 tw-text-sm">
                        <label for="is_favorite" class="tw-font-medium tw-text-gray-700">Favorite?</label>
                    </div>
                </div>
            </div>
            <div class="tw-flex tw-flex-col tw-items-center">
                <button type="submit"
                    class="tw-w-100 tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
@endsection
