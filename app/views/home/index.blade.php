@extends('template.default')

@section('pageName')
    Home
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns content">
			<h2>Deimos</h2>
			<p>
			<b>Deimos</b> is an ambitious projet for our freshman year at EPITA. It is basically an old school competitive 3D FPS featuring unique gameplay mechanisms, such as a "mystery" weapon that allows to challenge other players in fun mini-games instead of a classical gun fight.
			</p>
			
			<div>
				<ul class="clearing-thumbs" data-clearing>
					<li><a href="images/screenshots/img1.jpg" data-no-instant><img src="images/screenshots/img1-th.jpg"></a></li>
					<li><a href="images/screenshots/img2.jpg" data-no-instant><img src="images/screenshots/img2-th.jpg"></a></li>
					<li><a href="images/screenshots/img3.jpg" data-no-instant><img src="images/screenshots/img3-th.jpg"></a></li>
				</ul>
				<p><em>Deimos game engine featuring a Half-life&reg; map with original textures</em></p>
			</div>
	
			<p>
				<b>Deimos</b> is being developped by four members: Manou Manouel (game engine), Cyrilou (visuals/sounds), Uranus (gameplay) & Loupou (server/networking). We have already come a long way during the creation of the game, as the graphical engine is mostly complete, along with working physics, WIP server and miscellaneous gameplay elements.
			</p>
	
			<p>
				<em><a href="{{ URL::action('NewsController@getIndex') }}">Stay tuned for more news about Deimos! &#8594;</a></em>
			</p>
		</div>
	</div>
@endsection