@if($paginator->hasPages())
    <div class="pagination">
        <div class="pagination__results">
            <p>{{__('Results')}}: {{$paginator->firstItem()}}
                - {{$paginator->lastItem()}} {{__('of')}} {{$paginator->total()}}</p>
        </div>
        <div class="pagination_navigation">

            @if($paginator->onFirstPage())
                <a class="btn last_page inactive" href="{{$paginator->previousPageUrl()}}"><i class="fi fi-rr-angle-double-left"></i></a>
            @else
                <a class="btn last_page" href="{{$paginator->previousPageUrl()}}"><i class="fi fi-rr-angle-double-left"></i></a>
            @endif


            <div class="pagination__links">
                @for ($count = 1; $count <= $paginator->lastPage(); $count++)

                    @if ($paginator->currentPage() > 4 && $count === 2)
                        <span class="btn dots">...</span>
                    @endif


                    @if ($count === $paginator->currentPage())
                        <span class="btn active">{{ $count }}</span>
                    @elseif ($count === $paginator->currentPage() + 1 || $count === $paginator->currentPage() + 2 || $count === $paginator->currentPage() - 1 || $count === $paginator->currentPage() - 2 || $count === $paginator->lastPage() || $count === 1)
                        <a class="btn" href="{{ $paginator->url($count) }}">{{ $count }}</a>
                    @endif


                    @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $count === $paginator->lastPage() - 1)
                        <span class="btn dots">...</span>
                    @endif
                @endfor
            </div>

            @if($paginator->currentPage() === $paginator->lastPage())
                <a class="btn last_page inactive" href="{{$paginator->nextPageUrl()}}"><i class="fi fi-rr-angle-double-right"></i></a>
            @else
                <a class="btn last_page" href="{{$paginator->nextPageUrl()}}"><i class="fi fi-rr-angle-double-right"></i></a>
            @endif
        </div>
    </div>
@endif

