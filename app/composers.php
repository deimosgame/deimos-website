<?php

// Convert the session message into a real variable
View::composer('*', function($view)
{
    if(!empty(Session::get('message')))
    {
        return $view->with('message', Session::get('message'));
    }

    return $view;
});

View::composer('partials.news-widget', function($view)
{
    $view->with('news', News::orderBy('id', 'DESC')->take(2)->get());
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



View::composer('gamefeed.index', function($view)
{
    $gamefeed = GameFeed::orderBy('gamefeed.id', 'DESC')->take(10)
        ->join('users', 'users.id', '=', 'gamefeed.user_id')
        ->select('gamefeed.id', 'gamefeed.event_id', 'gamefeed.content', 
            'gamefeed.created_at', 'users.username', 'users.email_md5')
        ->get();
    $view->with('gamefeed', $gamefeed);
});