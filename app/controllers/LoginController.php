<?php

class LoginController extends BaseController
{

	public function getIndex()
	{
		return View::make('home.login');
	}

	public function postSubmit()
	{
		$attempt = Auth::attempt([
			'username' => Input::get('username'),
			'password' => Input::get('password')
		], true);
		if(!$attempt)
		{
			return Redirect::action('LoginController@getIndex')
				->with('error', 'Wrong username/password. Please try again!')
				->withInput();
		}

		return Redirect::home()
			->with('info', 'You are now logged in!');
	}

}