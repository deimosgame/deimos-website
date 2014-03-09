<?php

View::composer('*', function($view)
{
	// Convert the session message into a real variable
    if(!empty(Session::get('message')))
    {
        return $view->with('message', Session::get('message'));
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
    	if(Request::is($value->link.'*'))
    	{
    		$currentItem = $value->id;
    		break;
    	}
    }
    $view->with('menuSubItem', MenuSubItem::where('menu_id', '=', $currentItem));
});


View::composer('news.index', function($view)
{
	$view->with('news', News::orderBy('id', 'DESC')->paginate(10));
	View::share('hideNewsWidget', true);
});

View::composer('gamefeed.index', function($view)
{
    $gamefeed = GameFeed::orderBy('gamefeed.id', 'DESC')
        ->join('users', 'users.id', '=', 'gamefeed.user_id')
        ->select('gamefeed.id', 'gamefeed.event_id', 'gamefeed.content', 
            'gamefeed.created_at', 'users.username', 'users.email_md5')
        ->paginate(10);
    $view->with('gamefeed', $gamefeed);
});