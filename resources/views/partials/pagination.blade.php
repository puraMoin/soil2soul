<div class="mt-30"> 
<div class="row">
<div class="col-sm-6">
<div class="total_records">Total Records: <span>{{ $items->total() }}</span>   </div>
</div>

<div class="col-sm-6">
    <nav aria-label="Page navigation example" class="pagination_new">


<ul class="pagination">
    <!-- Previous Page Link -->
    @if ($items->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&laquo;</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $items->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    @endif

    <!-- Pagination Elements -->
    @php
        $start = max(1, $items->currentPage() - 5);
        $end = min($start + 9, $items->lastPage());
    @endphp

    @if($start > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $items->url(1) }}">1</a>
        </li>
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">...</span>
        </li>
    @endif

    @foreach ($items->getUrlRange($start, $end) as $page => $url)
        <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
    @endforeach

    @if($end < $items->lastPage())
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">...</span>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $items->url($items->lastPage()) }}">{{ $items->lastPage() }}</a>
        </li>
    @endif

    <!-- Next Page Link -->
    @if ($items->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $items->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&raquo;</span>
        </li>
    @endif
</ul>
    </nav>
</div>     
</div>  
</div>