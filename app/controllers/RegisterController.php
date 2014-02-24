<?php

class RegisterController extends BaseController
{

	public function getIndex()
	{
		return View::make('home.register');
	}

	public function postSubmit()
	{
		$v = Validator::make(Input::all(), User::$rules);
		if($v->fails())
		{
			return Redirect::action('HomeController@getIndex')
				->with('message', $v->messages()->first())
				->withInput();
		}
		$user = User::createUser(
			Input::get('username'), 
	   		Input::get('email'), 
	   		Input::get('password')
	   	);
	   	Auth::login($user);

	   	return Redirect::home()
	   		->with('message', 'You have successfully been registered and logged in!');
	}

}