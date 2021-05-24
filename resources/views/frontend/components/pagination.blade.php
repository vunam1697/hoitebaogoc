@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pagination">
        <ul class="addon__pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                
            @else
                <li class="addon__pagination-item">
                    <a class="addon__pagination-item-link" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="addon__pagination-item" class="active">
                                <a class="addon__pagination-item-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="addon__pagination-item">
                                <a class="addon__pagination-item-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @elseif ($page == $paginator->lastPage() - 1 || $page == $paginator->lastPage() - 2 || $paginator->currentPage())
                            <li class="addon__pagination-item">
                                <a class="addon__pagination-item-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="addon__pagination-item">
                    <a class="addon__pagination-item-link" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <!-- Pagination -->
@endif
