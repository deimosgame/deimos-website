@extends('template.default')

@section('pageName')
    News
@endsection

@section('content')
	<div class="row">
		<div class="large-6 columns" style="padding: 0;">
		    @foreach($news as $key => $thisNews)
		    @if($key % 2 == 1) <?php continue; ?> @endif
		    <div class="news large-12 columns">
		        <div class="title">
	    			<a href="{{ URL::action('NewsController@getView', [$thisNews->id]) }}">
			            <h4>
			                {{{ $thisNews->title }}}
			            </h4>
	    			</a>
		        </div>
	            <div class="large-12 columns content text-justify">
	                {{ Markdown::string($thisNews->preview) }}
	            </div>
	            <div class="large-12 columns content">
	            	<span class="left less-important" style="font-size: 0.8em;">
	            		<a href="{{ URL::action('NewsController@getView', [$thisNews->id]) }}"><em>Want to read more? click here!</em></a>
	            	</span>
	                <span class="right less-important">
	                    {{{ $thisNews->created_at->diffForHumans() }}}
	                </span>
		        </div>
		    </div>
		    <div class="clear"></div>
			<div class="margin-top"></div>
		    @endforeach
		</div>

		<div class="large-6 columns" style="padding: 0;">
		    @foreach($news as $key => $thisNews)  
		    @if($key % 2 == 0) <?php continue; ?> @endif
		    <div class="news large-12 columns">
		        <div class="title">
	    			<a href="{{ URL::action('NewsController@getView', [$thisNews->id]) }}">
			            <h4>
			                {{{ $thisNews->title }}}
			            </h4>
	    			</a>
		        </div>
	            <div class="large-12 columns content text-justify">
	                {{ Markdown::string($thisNews->preview) }}
	            </div>
	            <div class="large-12 columns content">
	            	<span class="left less-important" style="font-size: 0.8em;">
	            		<a href="{{ URL::action('NewsController@getView', [$thisNews->id]) }}"><em>Want to read more? click here!</em></a>
	            	</span>
	                <span class="right less-important">
	                    {{{ $thisNews->created_at->diffForHumans() }}}
	                </span>
		        </div>
		    </div>
		    <div class="clear"></div>
			<div class="margin-top"></div>
		    @endforeach
		</div>
	</div>

    {{ $news->links() }}
@endsection