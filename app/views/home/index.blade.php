@extends('template.default')

@section('pageName')
    Home
@endsection

@section('content')
	<div class="gamefeed">
        <div class="playershare">
            <div class="content">
                <div class="raw">
                    <div class="large-12 columns">
                        <input type="text" name="share" placeholder="Share your thoughts!"><br />
                        <span class="left">Please respect other players and stay polite.</span>
                        <div class="right">
                            @if(Auth::check())
                            <input type="submit" class="tiny button" value="Share">
                            @else
                            <span><a href="{{{ URL::action('LoginController@getIndex') }}}" style="">Login</a></span>
                            @endif
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="raw">
                <div class="large-2 columns">
                    <img src="//secure.gravatar.com/avatar/1b0b8343ac45f738162090b8715ec879" alt="">
                </div>
                <div class="large-8 columns">
                    Today, I hate an apple, because Apple rocks.
                    <div class="infos">
                        Yesterday, at 3PM.
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="content">
            <div class="raw">
                <div class="large-2 columns">
                    <img src="//secure.gravatar.com/avatar/1b0b8343ac45f738162090b8715ec879" alt="">
                </div>
                <div class="large-8 columns">
                    Today, I hate an apple, because Apple rocks.
                    <div class="infos">
                        Yesterday, at 3PM.
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="content">
            <div class="raw">
                <div class="large-2 columns">
                    <img src="//secure.gravatar.com/avatar/1b0b8343ac45f738162090b8715ec879" alt="">
                </div>
                <div class="large-8 columns">
                    Today, I hate an apple, because Apple rocks.
                    <div class="infos">
                        Yesterday, at 3PM.
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection