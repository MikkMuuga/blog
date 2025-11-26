@if ($paginator->hasPages())
    <div class="flex justify-center gap-2 my-4">
        @if ($paginator->onFirstPage())
            <button class="btn btn-disabled" disabled>
                @lang('pagination.previous')
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary">
                @lang('pagination.previous')
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary">
                @lang('pagination.next')
            </a>
        @else
            <button class="btn btn-disabled" disabled>
                @lang('pagination.next')
            </button>
        @endif
    </div>
@endif