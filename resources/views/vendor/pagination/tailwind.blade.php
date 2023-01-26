@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="tw-flex tw-items-center tw-justify-between">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="tw--mt-px tw-flex tw-w-0 tw-flex-1">
            @if ($paginator->onFirstPage())
                <span
                    class="tw-cursor-default tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-pt-4 tw-pr-1 tw-text-sm tw-font-medium tw-text-gray-500">
                    <!-- Heroicon name: mini/arrow-long-left -->
                    <svg class="tw-mr-3 tw-h-5 tw-w-5 tw-text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                            clip-rule="evenodd" />
                    </svg>
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-pt-4 tw-pr-1 tw-text-sm tw-font-medium tw-text-indigo-600 hover:tw-border-indigo-300 hover:tw-indigo-700 tw-transition-all tw-duration-200">
                    <!-- Heroicon name: mini/arrow-long-left -->
                    <svg class="tw-mr-3 tw-h-5 tw-w-5 tw-text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                            clip-rule="evenodd" />
                    </svg>
                    Previous
                </a>
            @endif
        </div>
        <div class="tw-hidden md:tw--mt-px md:tw-flex">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span
                            class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-px-4 tw-pt-4 tw-text-sm tw-font-medium tw-text-gray-500">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span
                                    class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-indigo-500 tw-px-4 tw-pt-4 tw-text-sm tw-font-medium tw-text-indigo-600">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-px-4 tw-pt-4 tw-text-sm tw-font-medium tw-text-gray-500 hover:tw-border-gray-300 hover:tw-text-gray-700 tw-transition-all tw-duration-200"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="tw--mt-px tw-flex tw-w-0 tw-flex-1 tw-justify-end">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-pt-4 tw-pl-1 tw-text-sm tw-font-medium tw-text-indigo-600 hover:tw-border-indigo-300 hover:tw-text-indigo-800 tw-transition-all tw-duration-200">
                    Next
                    <svg class="tw-text-indigo-400 tw-ml-3 tw-h-5 tw-w-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <span
                    class="tw-inline-flex tw-items-center tw-border-t-2 tw-border-transparent tw-pt-4 tw-pl-1 tw-text-sm tw-font-medium tw-text-gray-500">
                    Next
                    <svg class="tw-ml-3 tw-h-5 tw-w-5 tw-text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </div>
    </nav>

    <div class="tw-flex tw-justify-center tw-items-center tw-mt-2">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-300">
                Showing
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                of
                <span class="font-medium">{{ $paginator->total() }}</span>
                results
            </p>
        </div>
    </div>
@endif
