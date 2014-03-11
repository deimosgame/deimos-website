@extends('template.default')

@section('pageName')
    Home
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns content">
			<h2>Deimos</h2>
			<p>
				<b>Deimos</b> is our freshman year project at EPITA. It is basically an oldschool competitive 3D FPS featuring unique gameplay mechanisms, such as a "mystery" weapon that allows players to challenge others in fun and different mini-games in addition to the classical fast-paced gun fight.
			</p>
			


			
			
			<div>
				<ul class="clearing-thumbs" data-clearing>
					<li><a href="images/screenshots/img1.jpg" data-no-instant><img src="images/screenshots/img1-th.jpg"></a></li>
					<li><a href="images/screenshots/img2.jpg" data-no-instant><img src="images/screenshots/img2-th.jpg"></a></li>
					<li><a href="images/screenshots/img3.jpg" data-no-instant><img src="images/screenshots/img3-th.jpg"></a></li>
				</ul>
				<p><em>Deimos game engine featuring an imported Half-life&reg; map with its original textures</em></p>
			</div>
	
			<p>
				<b>Deimos</b> is being developed by four members: Manou Manouel (Game Engine), Cyrilou (Visuals/Sounds), Uranus (Gameplay) & Loupou (Server/Networking). We have already come a long way in the creation of the game, as the graphical engine is mostly complete, along with working physics, WIP server and core gameplay elements.
			</p>
	
			<p>
				<em><a href="{{ URL::action('NewsController@getIndex') }}">Stay tuned for more news about Deimos! &#8594;</a></em>
			</p>
		</div>
	</div>
@endsection