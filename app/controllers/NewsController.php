<?php

class NewsController extends BaseController
{

	public function getIndex()
	{
		return View::make('news.index');
	}

	public function getView($news)
	{
		$thisNews = News::find($news);
		if(empty($thisNews))
		{
			App::abort(404);
		}

		return View::make('news.view')
			->with('news', $thisNews);
	}

}