<?php

class GameFeedController extends BaseController
{

	public function getIndex()
	{
		return View::make('gamefeed.index');
	}

	public function postSubmit()
	{
		$v = Validator::make(Input::all(), GameFeed::$rules);
		if($v->fails())
		{
			return Redirect::action('GameFeedController@getIndex')
				->with('message', $v->messages()->first())
				->withInput();
		}

		$newFeed = new GameFeed;
		$newFeed->user_id = Auth::user()->id;
		$newFeed->content = Input::get('content');
		$newFeed->save();

		return Redirect::action('GameFeedController@getIndex');
	}

}