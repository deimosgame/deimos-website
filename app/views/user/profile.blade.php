@extends('template.default')

@section('pageName')
    Profile
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns clearfix" style="margin-top: 15px;">
			<div class="left">
				<img src="//secure.gravatar.com/avatar/{{{ $user->email_md5 }}}" alt="" style="height: 100px;">
			</div>
			<div class="right text-right" style="height: 100px; vertical-align: middle; padding-top: 25px;">
				<span style="color: white; font-size: 1.5em;">{{{ $user->username }}}</span> <br>
				<span style="color: #D1D1D1; font-size: 1.2em;">{{{ $user->email }}}</span>
				@if(Auth::user()->id != $user->id)
				<br> <span style="color: #D1D1D1;"><a href="{{ URL::action('UserController@getAchievements') }}?user={{ $user->id }}">Achievements &#10141;</a></span>
				@endif
			</div>
		</div>
	</div>

	<div class="gamefeed">
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
                        {{{ $feed->created_at->diffForHumans() }}}
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        @endforeach
	</div>
@endsection