@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @php
        $prevPage = null;
        @endphp

        @foreach ($element as $page => $url)
        {{-- Check if there's a gap between the current page and the previous page --}}
        @if (!is_null($prevPage) && $page - $prevPage > 1)
        {{-- If there's a gap, display a dot --}}
        <li><span>&hellip;</span></li>
        @endif

        {{-- Display the current page number --}}
        <li>
            @if ($page == $paginator->currentPage())
            <span class="active" aria-current="page">{{ $page }}</span>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
        </li>

        {{-- Add dot between page numbers --}}
        @if (!is_null($prevPage) && $page - $prevPage == 1 && !$loop->last)
        <li><span>&middot;</span></li>
        @endif

        @php
        $prevPage = $page;
        @endphp
        @endforeach
        @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif