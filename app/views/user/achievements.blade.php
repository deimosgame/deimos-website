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
				<br> <span style="color: #D1D1D1;"><a href="{{ URL::action('UserController@getIndex') }}?user={{ $user->id }}">&#8592; Profile</a></span>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('content-outside')
	<div class="row">
		<div class="large-12 columns">
			<table class="large-12 custom">
                <thead>
                    <tr>
                        <th width="15"><span>Name</span></th>
                        <th><span>Description</span></th>
                        <th><span>Date</span></th>
                    </tr>
                </thead>
                <tbody>
	                @if(count($achievements) == 0)
					<tr>
						<td colspan="3" class="text-center">No achievement has been unlocked yet!</td>
					</tr>
	                @endif
                	@foreach($achievements as $achievement)
                    <tr>
                        <td>{{{ $achievement->name }}}</td>
                        <td>{{{ $achievement->description}}}</td>
                        <td>{{{ $achievement->created_at->diffForHumans() }}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
@endsection