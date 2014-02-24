<nav>
    <ul class="no-bullet large-12 columns">
	@foreach($menuItem as $item)
        @if($item->outlink)
        <a href="{{ $item->link }}">
        @else
        <a href="{{ URL::to($item->link) }}">
        @endif
        <li class="large-3 column {{ (Request::is($item->pattern)) ? 'selected' : '' }}">
            {{{ $item->name }}}
        </li>
        </a>
	@endforeach
    </ul>
</nav>
<nav>
<nav>
    <ul class="no-bullet large-12 columns">
	@foreach($menuSubItem as $item)
        <li class="large-3 column {{ (Request::is($item->pattern)) ? 'selected' : '' }}">
            @if($item->outlink)
            <a href="{{ $item->link }}">{{{ $item->name }}}</a>
            @else
            <a href="{{ URL::to($item->link) }}">{{{ $item->name }}}</a>
            @endif
        </li>
	@endforeach
    </ul>
</nav>