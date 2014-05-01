<?php

class UserController extends BaseController
{

	public function getIndex()
	{
		return View::make('user.profile');
	}

	public function getAchievements()
	{
		return View::make('user.achievements');
	}

	public function getSettings()
	{
		return View::make('user.settings');
	}

	public function postSettings()
	{
		$ruleUsername = 'min:6|max:30|alpha_num|unique:users,username';
		if(Auth::user()->username == Input::get('username'))
		{
			$ruleUsername = '';
		}

		$v = Validator::make(Input::all(), [
			'username' => $ruleUsername,
			'password_new' => 'min:6|max:100|confirmed'
		]);
		if($v->fails())
		{
			return Redirect::action('UserController@getSettings')
				->with('error', $v->messages()->first())
				->withInput();
		}

		if(!Auth::validate(['email' => Auth::user()->email, 'password' => Input::get('password_old')]))
		{
			return Redirect::action('UserController@getSettings')
				->with('error', 'Please check your current password.')
				->withInput();
		}

		Auth::user()->username = Input::get('username');
		if(!empty(Input::get('password_new')))
		{
			Auth::user()->password = Hash::make(Input::get('password_new'));
		}

		return Redirect::action('UserController@getSettings')
				->with('success', 'Your settings have successfully been updated.');
	}


	public function getView($userId)
	{

	}

}