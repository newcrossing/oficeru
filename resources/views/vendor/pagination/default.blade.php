{{--<div class="blog-pagination button-block center">--}}
{{--    <a class="button small nobg primary" href="#">&larr; Prev</a>--}}
{{--    <a class="button small nobg primary" href="#">...</a>--}}
{{--    <span class="button small nobg primary current">4</span>--}}
{{--    <a class="button small nobg primary" href="#">5</a>--}}
{{--    <a class="button small nobg primary" href="#">6</a>--}}
{{--    <a class="button small nobg primary" href="#">...</a>--}}
{{--    <a class="button small nobg primary" href="#">192</a>--}}
{{--    <a class="button small nobg primary" href="#">Next &rarr;</a>--}}
{{--</div>--}}



@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="page-item @if ($paginator->onFirstPage())  disabled @endif">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-left small"></i>
                  </span>
                </a>
            </li>


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="button small nobg primary ">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>

                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}

            <li class="page-item @if (!$paginator->hasMorePages())  disabled @endif">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-right small"></i>
                  </span>
                </a>
            </li>

        </ul>
    </nav>

@endif
