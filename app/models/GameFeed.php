<?php

class GameFeed extends Eloquent {
	protected $table = 'gamefeed';

	public static $rules = array(
		'content' => 'required|min:15|max:200'
	);
}