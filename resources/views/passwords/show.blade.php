@extends('layouts.menu')

@section('title', $title)

@section('content')
    <div class="tw-p-6 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg">
        <h5 class="tw-mb-3 tw-text-xl tw-font-bold tw-tracking-tight tw-text-gray-900 tw-text-left">
            {{ __('Password - #' . $password->id) }}</h5>
        <div class="tw-border-t tw-border-gray-200 tw-px-4 tw-py-5 sm:tw-p-0">
            <dl class="sm:tw-divide-y sm:tw-divide-gray-200">
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-semibold tw-text-gray-500">Name</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-text-gray-900 sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $password->password_name }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-bold tw-text-black">Login Info</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-font-bold tw-text-black sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $decrypted_login ?? 'No login info' }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-bold tw-text-black">Password</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-font-bold tw-text-black sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $decrypted_pass ?? 'No decrypted' }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-semibold tw-text-gray-500">Category</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-text-gray-900 sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $password->category->category_name }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-semibold tw-text-gray-500">Created At</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-text-gray-900 sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $password->created_at }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-semibold tw-text-gray-500">Last Update</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-text-gray-900 sm:tw-col-span-2 sm:tw-mt-0">
                        {{ $password->updated_at }}</dd>
                </div>
                <div class="tw-py-4 sm:tw-grid sm:tw-grid-cols-3 sm:tw-gap-4 sm:tw-py-5 sm:tw-px-6">
                    <dt class="tw-text-sm tw-font-semibold tw-text-gray-500">Actions</dt>
                    <dd class="tw-mt-1 tw-text-sm tw-text-gray-900 sm:tw-col-span-2 sm:tw-mt-0">
                        <div class="tw-inline-flex tw-gap-1">
                            <a href="{{ route('passwords.index') }}" title="Validate Password"
                                class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-blue-700 hover:tw-bg-blue-800 focus:tw-ring-4 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i></a>

                            <a href="{{ route('passwords.edit', [$password->id]) }}" title="Edit Password"
                                class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-yellow-500 hover:tw-bg-yellow-600 focus:tw-ring-4 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <form method="POST" action="{{ route('passwords.destroy', [$password->id]) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"
                                    class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-red-500 hover:tw-bg-red-600 focus:tw-ring-4 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"
                                    title="Delete Password" onclick="return confirm('Delete?')"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
