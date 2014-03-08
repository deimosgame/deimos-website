<?php

class FoundationPresenter extends Illuminate\Pagination\Presenter 
{

    public function getActivePageWrapper($text)
    {
        return '<li class="current">'.$text.'</li>';
    }

    public function getDisabledTextWrapper($text)
    {
    	if($text == Lang::get('pagination.previous') || $text == Lang::get('pagination.next'))
    	{
    		return '<li class="arrow unavailable">'.$text.'</li>';
    	}
        return '<li class="unavailable">'.$text.'</li>';
    }

    public function getPageLinkWrapper($url, $page)
    {
    	if($page == Lang::get('pagination.previous') || $page == Lang::get('pagination.next'))
    	{
    		return '<li class="arrow"><a href="'.$url.'">'.$page.'</a></li>';
    	}
        return '<li><a href="'.$url.'">'.$page.'</a></li>';
    }

}