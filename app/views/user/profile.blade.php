@extends('template.default')

@section('pageName')
    Profile
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns clearfix" style="margin-top: 15px;">
			<div class="left">
				<img src="//secure.gravatar.com/avatar/{{{ Auth::user()->email_md5 }}}" alt="" style="height: 100px;">
			</div>
			<div class="right text-right" style="height: 100px; vertical-align: middle; padding-top: 25px;">
				<span style="color: white; font-size: 1.5em;">{{{ Auth::user()->username }}}</span> <br>
				<span style="color: #D1D1D1; font-size: 1.2em;">{{{ Auth::user()->email }}}</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			
		</div>
	</div>
@endsection