<ul>
    @foreach($items as $item)
        <li>
            @if(count($item['child']) > 0)
                <a href="{{ $item['link'] }}">{{ $item['label'] }} <i class="demo-icon icon-arrow-down"></i></a>
                @include('partials.menu.custom-menu-items', ['items' => $item['child']])
            @else
                <a href="{{ $item['link'] }}">{{ $item['label'] }}</a>
            @endif
        </li>
    @endforeach
</ul>
