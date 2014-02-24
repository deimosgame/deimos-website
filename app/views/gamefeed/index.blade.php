@extends('template.default')

@section('pageName')
    Home
@endsection

@section('content')
    <div class="gamefeed">
        <div class="playershare">
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
        @foreach($gamefeed as $feed)
        <div class="content">
            <div class="raw">
                <div class="large-2 columns">
                    <img src="//secure.gravatar.com/avatar/{{{ $feed->email_md5 }}}" alt="">
                </div>
                <div class="large-8 columns">
                    {{{ $feed->content}}}
                    <div class="infos">
                        {{{ $feed->username }}} - 
                        {{{ $feed->created_at }}}
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        @endforeach
    </div>
@endsection