@if ($paginator->hasPages())
    <div class="flex items-center justify-center space-x-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="px-4 py-2 text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-md font-bold">
                <span class="material-icons text-gray-500">
                    arrow_back_ios
                </span>
                {{-- Previous --}}
            </div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 transition duration-200 ease-in-out shadow-md font-bold">
                <span class="material-icons text-gray-700">
                    arrow_back_ios
                </span>
                {{-- Previous --}}
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="px-4 py-2 text-white bg-gray-800 border border-gray-300 cursor-not-allowed rounded-md">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 transition duration-200 ease-in-out shadow-md">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 transition duration-200 ease-in-out shadow-md font-bold">
                {{-- Next --}}
                <span class="material-icons text-gray-700">
                    arrow_forward_ios
                </span>
            </a>
        @else
            <div class="px-4 py-2 text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-md font-bold">
                {{-- Next --}}
                <span class="material-icons text-gray-500">
                    arrow_forward_ios
                </span>
            </div>
        @endif
    </div>
    <div class="mt-4 text-center text-white">
        Showing {{ ($paginator->currentPage()-1) * $paginator->perPage()+1 }} to {{ ($paginator->currentPage()-1) * $paginator->perPage() + count($paginator->items())}} out of {{ $paginator->total() }} results
    </div>
@endif