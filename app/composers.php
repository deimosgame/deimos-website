<?php

View::composer('*', function($view)
{
	// Convert the session message into a real variable
    if(!empty(Session::get('error')))
    {
        return $view->with('error', Session::get('error'));
    }
    if(!empty(Session::get('info')))
    {
        return $view->with('info', Session::get('info'));
    }
});

View::composer('partials.news-widget', function($view)
{
    $view->with('news', News::orderBy('id', 'DESC')->take(5)->get());
});

View::composer('partials.menu', function($view)
{
	$menuItems = MenuItem::get();
    $view->with('menuItem', $menuItems);
    $currentItem = 0;
    foreach ($menuItems as $value) {
    	if(Request::is($value->pattern))
    	{
    		$currentItem = $value->id;
    		break;
    	}
    }
    $view->with('menuSubItem', MenuSubItem::where('menu_id', '=', $currentItem)->get());
});


View::composer('news.index', function($view)
{
	$view->with('news', News::orderBy('id', 'DESC')->paginate(10));
});
View::composer('news.*', function($view)
{
	View::share('hideNewsWidget', true);
});

View::composer('gamefeed.index', function($view)
{
    $gamefeed = GameFeed::orderBy('gamefeed.id', 'DESC')
        ->join('users', 'users.id', '=', 'gamefeed.user_id')
        ->select('gamefeed.id', 'gamefeed.achievement_id', 'gamefeed.content', 
            'gamefeed.created_at', 'users.username', 'users.email_md5',
            'gamefeed.user_id')
        ->paginate(20);
    $view->with('gamefeed', $gamefeed);
});


View::composer('user.profile', function($view)
{
	$user     = User::find(Input::get('user'));
	if(empty($user))
	{
		App::abort(404);
	}
	$gamefeed = GameFeed::orderBy('gamefeed.id', 'DESC')
		->join('users', 'users.id', '=', 'gamefeed.user_id')
		->where('gamefeed.user_id', '=', (int)Input::get('user'))
        ->select('gamefeed.id', 'gamefeed.achievement_id', 'gamefeed.content', 
            'gamefeed.created_at', 'users.username', 'users.email_md5',
            'gamefeed.user_id')
        ->paginate(20);

    $view->with('gamefeed', $gamefeed);
    $view->with('user', $user);
});

View::composer('user.achievements', function($view)
{
	$user     = User::find(Input::get('user'));
	if(empty($user))
	{
		App::abort(404);
	}
	$achievements = UserAchievement::where('user_achievements.user_id', '=', (int)Input::get('user'))
		->join('achievements', 'achievements.id', '=', 'user_achievements.achievement_id')
		->select('achievements.id', 'achievements.name', 'achievements.description')
		->get();
	$view->with('achievements', $achievements);
	$view->with('user', $user);
});