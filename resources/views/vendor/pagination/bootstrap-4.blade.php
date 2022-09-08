@if ($paginator->hasPages())
    <ul class="pagination modal-1">
        @if ($paginator->onFirstPage())
            <li><a class="prev btn disabled text-dark">&laquo</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="prev">&laquo</a></li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                @php
                    $page_url = strrev(preg_replace(strrev("/$last_showed_page/"),strrev($last_showed_page + 1),strrev($last_showed_page_url),1));
                @endphp
                <li><a href="{{ $page_url }}">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @php
                        $last_showed_page = $page;
                        $last_showed_page_url = $url;
                    @endphp

                    @if ($page == $paginator->currentPage())
                        <li><a class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a class="next" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
        @else
            <li><a class="next btn disabled text-dark">&raquo;</a></li>
        @endif
    </ul>
    <style>
        .pagination {
            list-style: none;
            display: inline-block;
            padding: 0;
            margin-top: 10px;
        }

        .pagination li {
            display: inline;
            text-align: center;
        }

        .pagination a {
            float: left;
            display: block;
            font-size: 14px;
            text-decoration: none;
            padding: 5px 12px;
            color: #fff;
            margin-left: -1px;
            border: 1px solid transparent;
            line-height: 1.5;
        }

        .pagination a.active {
            cursor: default;
        }

        .pagination a:active {
            outline: none;
        }

        .modal-1 li:first-child a {
            border-radius: 6px 0 0 6px;
        }

        .modal-1 li:last-child a {
            border-radius: 0 6px 6px 0;
        }

        .modal-1 a {
            border-color: #ddd;
            color: #4285F4;
            background: #fff;
        }

        .modal-1 a:hover {
            background: #eee;
        }

        .modal-1 a.active, .modal-1 a:active {
            border-color: #4285F4;
            background: #4285F4;
            color: #fff;
        }
    </style>
@endif
