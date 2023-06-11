@php
    $paginatorVariable = $paginatorVariable ?? null;
    $currentPage = $paginatorVariable->currentPage();
    $lastPage = $paginatorVariable->lastPage();
    $previousPageUrl = $paginatorVariable->previousPageUrl();
    $nextPageUrl = $paginatorVariable->nextPageUrl();
@endphp

@if ($paginatorVariable && $lastPage > 1)
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($currentPage > 1)
            <li><a href="{{ $previousPageUrl }}" rel="prev">&laquo;</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>&laquo;</span></li>
        @endif

        {{-- Pagination Elements --}}
        @for ($page = 1; $page <= $lastPage; $page++)
            @if ($currentPage === $page)
                <li class="active" aria-current="page"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $paginatorVariable->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($currentPage < $lastPage)
            <li><a href="{{ $nextPageUrl }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
