<?php

class LoginController extends BaseController
{

	public function getIndex()
	{
		return View::make('home.login');
	}

	public function postSubmit()
	{
		$attempt = Auth::attempt(array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		));
		if(!$attempt)
		{
			return Redirect::action('HomeController@getLogin')
				->with('message', 'Wrong username/password. Please try again!')
				->withInput();
		}

		return Redirect::home()
			->with('message', 'You are now logged in!');
	}

}