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
            New Category</h5>
        <form class="tw-space-y-4 md:tw-space-y-6" action="{{ route('categories.store') }}" method="post">
            @csrf
            <div>
                <label for="category_name" class="tw-block tw-text-sm tw-font-medium tw-text-gray-900">Category Name</label>
                <input type="text" name="category_name" id="category_name" placeholder="Bank"
                    class="tw-bg-gray-50 tw-border @error('category_name') !tw-border-red-300 @enderror tw-border-gray-300 tw-text-gray-900 sm:tw-text-sm tw-rounded-lg focus:tw-ring-indigo-600 focus:border-indigo-600 tw-block tw-w-full tw-p-2.5"
                    required>
                @error('category_name')
                    <span class="invalid-feedback tw-block tw-text-sm tw-font-medium tw-text-red-900" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="tw-flex tw-flex-col tw-items-center">
                <button type="submit"
                    class="tw-w-100 tw-rounded-lg tw-transition-all tw-duration-200 tw-bg-indigo-600 tw-px-4 tw-py-1.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-white hover:tw-text-white tw-shadow-sm tw-ring-1 tw-ring-indigo-600 hover:tw-bg-indigo-700">Create</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
