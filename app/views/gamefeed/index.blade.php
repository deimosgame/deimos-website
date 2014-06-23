@extends('template.default')

@section('pageName')
    Gamefeed
@endsection

@section('content')
    <div class="gamefeed">
        <div class="playershare">
        	<div class="row">
	            <div class="content">
	                {{ Form::open(array('action' => 'GameFeedController@postSubmit', 'autocomplete' => 'off')) }}
	                <div class="large-12 columns">
	                    {{ Form::text('content', null, array('placeholder' => 'Share your thoughts!')) }}
	                    <br />
	                    <span class="left">Please respect other players and stay polite.</span>
	                    <div class="right">
	                        @if(Auth::check())
	                        {{ Form::submit('Share', array('class' => 'tiny button')) }}
	                        @else
	                        <span><a href="{{{ URL::action('LoginController@getIndex') }}}" style="">Login</a></span>
	                        @endif
	                    </div>
	                    <div class="clear"></div>
	                </div>
	                <div class="clear"></div>
	                {{ Form::close() }}
	            </div>
        	</div>
        </div>
        @foreach($gamefeed as $feed)
        <div class="content">
            <div class="row">
                <div class="large-2 columns">
	                <a href="{{ URL::action('UserController@getView', [$feed->user_id]) }}">
	                    <img src="//secure.gravatar.com/avatar/{{{ $feed->email_md5 }}}" alt="">
	                </a>
                </div>
                <div class="large-8 columns">
                	@if($feed->achievement_id != null)
					<i class="fa fa-unlock-alt" style="margin-right: 15px;"></i>
                	@endif
                    {{{ $feed->content}}}
                    <div class="infos">
                        <a href="{{ URL::action('UserController@getIndex') }}?user={{ $feed->user_id }}">{{{ $feed->username }}}</a> - 
                        {{{ $feed->created_at->diffForHumans() }}}
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        @endforeach
    </div>
@endsection