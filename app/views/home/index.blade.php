@extends('template.default')

@section('pageDescription')
	<meta name="description" content="Deimos is a 3D retro FPS game, created by 4 students of EPITA. Try it, you won't regret it, we promess!" />
@endsection

@section('pageName')
    Home
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns content">
			<h2>Deimos</h2>
			<p class="text-justify">
				<b>Deimos</b> is our freshman year project at EPITA. It is basically an oldschool competitive 3D FPS featuring unique gameplay mechanisms, such as a "mystery" weapon that allows players to challenge others in fun and different mini-games in addition to the classical fast-paced gun fight.
			</p>
			
			<div>
				<ul class="clearing-thumbs small-block-grid-3" data-clearing>
					@for ($i = 1; $i <= 3; $i++)
						<li><a href="{{ URL::to('images/screenshots/img' . $i . '.jpg') }}" data-no-instant>{{ HTML::image('images/screenshots/img' . $i . '-th.jpg') }}</a></li>
					@endfor
					@for ($i = 4; $i <= 6; $i++)
						<li class="hide"><a href="{{ URL::to('images/screenshots/img' . $i . '.jpg') }}" data-no-instant>{{ HTML::image('images/screenshots/img' . $i . '-th.jpg') }}</a></li>
					@enfor
				</ul>
				<p><em>Deimos game engine featuring an imported Half-life&reg; map with its original textures</em></p>
			</div>
	
			<p class="text-justify">
				<b>Deimos</b> is being developed by four members: Manou Manouel (Game Engine), Cyrilou (Visuals/Sounds), Uranus (Gameplay) & Loupou (Server/Networking). We have already come a long way in the creation of the game, as the graphical engine is mostly complete, along with working physics, WIP server and core gameplay elements.
			</p>
	
			<p>
				<em><a href="{{ URL::action('NewsController@getIndex') }}">Stay tuned for more news about Deimos! &#8594;</a></em>
			</p>
		</div>
	</div>
@endsection