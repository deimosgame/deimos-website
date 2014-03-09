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


	public function getView($userId)
	{
		
	}

}