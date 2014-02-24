<?php

class LogoutController extends BaseController
{

	public function getIndex()
	{
		Auth::logout();
		return Redirect::action('HomeController@getIndex')
			->with('message', 'You have successfully been logged out!');
	}

}