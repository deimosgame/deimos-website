<nav>
    <ul class="no-bullet large-12 columns">
	@foreach($menuItem as $item)
		<?php
		$replace = '';
		if(Auth::check())
		{
			$replace = Auth::user()->id;
		}
		$item->link = str_replace('%USERID%', $replace, $item->link);
		?>
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
		<?php
		$replace = '';
		if(Auth::check())
		{
			$replace = Auth::user()->id;
		}
		$item->link = str_replace('%USERID%', $replace, $item->link);
		?>
        @if($item->outlink)
        	<a href="{{ $item->link }}">
        @else
        	<a href="{{ URL::to($item->link) }}">
        @endif
        <li class="large-4 column {{ (Request::is($item->pattern)) ? 'selected' : '' }}">
            {{{ $item->name }}}
        </li>
        </a>
	@endforeach
    </ul>
</nav>