@if ($paginator->hasPages())


    <label>Showing {{($paginator->currentpage()-1)*$paginator->perpage()+1}} - {{$paginator->currentpage()*$paginator->perpage()}} of  {{$paginator->total()}} results</label>


    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" style="display: none;"><a>«</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 3)
            <li><a>...</a></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                @if ($i == $paginator->currentPage())
                    <li><a  class="active">{{ $i }}</a></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li><a>...</a></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 1)
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled" style="display: none;"><a>»</a></li>
        @endif
    </ul>

@endif