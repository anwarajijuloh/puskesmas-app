@if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination justify-content-center mb-0 mt-4">
            @if ($paginator->onFirstPage())
                <li class="page-item disable" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span
                        class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                        rel="prev" aria-hidden="true">
                        <i class="ti ti-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                        href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="ti ti-chevron-left"></i>
                    </a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-current="page">
                        <span
                            class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span
                                    class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                        href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="ti ti-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" aria-hidden="true">
                        <i class="ti ti-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
