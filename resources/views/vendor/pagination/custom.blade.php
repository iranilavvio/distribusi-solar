@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"> <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span></a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"> <i
                            class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                            class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#"><i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span></a>
                </li>
            @endif
        </ul>
@endif
