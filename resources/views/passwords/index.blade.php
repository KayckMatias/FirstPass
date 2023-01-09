@extends('layouts.menu')

@section('title', $title)

@section('content')
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert_type') }}" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="tw-p-6 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg">
        <h5 class="tw-mb-3 tw-text-xl tw-font-bold tw-tracking-tight tw-text-gray-900 tw-text-left">Passwords <a href="{{ route('passwords.create') }}" title="Create Category"
            class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-bg-green-500 hover:tw-bg-green-600 focus:tw-ring-4 tw-ring-green-200 tw-font-medium tw-rounded-md tw-text-sm tw-px-4 tw-py-2 tw-ml-3">New</a>    
        </h5>
        <div class="tw-mb-3">
            <form action="{{ route('passwords.search') }}" method="POST">
                @csrf
                <div class="tw-flex">
                    <div class="tw-relative">
                        <div
                            class="tw-absolute tw-inset-y-0 tw-left-0 tw-flex tw-items-center tw-pl-3 tw-pointer-events-none">
                            <svg aria-hidden="true" class="tw-w-5 tw-h-5 tw-text-gray-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search"
                            value="{{ Str::contains(Request::route()->getName(), 'search') ? $search : '' }}"
                            id="search_passwords" name="search_passwords"
                            class="tw-block tw-w-100 tw-p-2.5 tw-pl-10 tw-text-sm tw-text-gray-900 tw-border tw-border-gray-300 tw-rounded-l-lg tw-bg-gray-50 focus:tw-ring-indigo-500 focus:tw-border-indigo-500"
                            placeholder="Search Passwords" required>
                    </div>
                    <button type="submit"
                        class="tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-indigo-700 hover:tw-bg-indigo-800 focus:tw-ring-4 tw-font-medium tw-rounded-r-lg tw-text-sm tw-px-4 tw-py-2">Search</button>
                </div>
            </form>
        </div>
        <div class="tw-relative tw-overflow-x-auto">
            <table class="tw-w-full tw-text-sm tw-text-left tw-text-gray-500">
                <thead class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-50 ">
                    <tr>
                        <th scope="col" class="tw-px-6 tw-py-3">#</th>
                        <th scope="col" class="tw-px-6 tw-py-3">Name</th>
                        <th scope="col" class="tw-px-6 tw-py-3">Login Info</th>
                        <th scope="col" class="tw-px-6 tw-py-3">Category</th>
                        <th scope="col" class="tw-px-6 tw-py-3">Favorite</th>
                        <th scope="col" class="tw-px-6 tw-py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($passwords as $item)
                        <tr class="tw-bg-white tw-border-b">
                            <td scope="row" class="tw-px-6 tw-py-4">{{ $loop->iteration }}</td>
                            <td class="tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap">
                                {{ $item->password_name }}</td>
                            <td class="tw-px-6 tw-py-4">
                                {{ !empty($item->password_login) ? $item->password_login : 'No login info' }}
                            </td>
                            <td class="tw-px-6 tw-py-4">{{ $item->category->category_name }}</td>
                            <td class="tw-px-6 tw-py-4">{{ $item->is_favorite == '1' ? 'Yes' : 'No' }}</td>
                            <td class="tw-px-6 tw-py-4">
                                <div class="tw-inline-flex tw-gap-1">
                                    <a href="{{ route('passwords.validate', [$item->id]) }}" title="Validate Password"
                                        class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-blue-700 hover:tw-bg-blue-800 focus:tw-ring-4 tw-ring-blue-200 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"><i
                                            class="fa fa-eye" aria-hidden="true"></i></a>

                                    <a href="{{ route('passwords.edit', [$item->id]) }}" title="Edit Password"
                                        class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-yellow-500 hover:tw-bg-yellow-600 focus:tw-ring-4 tw-ring-yellow-200 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <form method="POST" action="{{ route('passwords.destroy', [$item->id]) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit"
                                            class="tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-ml-0 tw-bg-red-500 hover:tw-bg-red-600 focus:tw-ring-4 tw-ring-red-200 tw-font-medium tw-rounded-md tw-text-sm tw-px-3 tw-py-2"
                                            title="Delete Password" onclick="return confirm('Delete?')"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            {{ $passwords->links() }}
        </div>
    </div>
@endsection
