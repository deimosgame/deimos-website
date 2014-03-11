<?php

class LogoutController extends BaseController
{

	public function getIndex()
	{
		Auth::logout();
		return Redirect::home()
			->with('info', 'You have successfully been logged out!');
	}

}