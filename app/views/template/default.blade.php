<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('images/favicon.ico') }}">
        <title>Deimos - @yield('pageName')</title>
        {{ HTML::style("//fonts.googleapis.com/css?family=Lato:300, 500, 700") }}
        {{ HTML::style("css/app.css") }}
        {{ HTML::style("css/lightbox.css") }}

        @yield('pageDescription') 
    </head>
    <body>

        <header>
            <a href="{{ URL::to('/') }}"><div id="header-logo"></div></a>
        </header>

        <div class="row">
            <h3 class="large-8 columns">
                <div class="content">
                    @yield('pageName')
                </div>
            </h3>
            <div class="large-4 columns">
                <div class="right" style="margin-top: 30px;">
                    <a href="#" class="split-button">Your profile <span data-dropdown="drop"></span></a><br>
                    <ul id="drop" class="f-dropdown" data-dropdown-content>
                        @if(Auth::check())
                        <li><a href="#">See my profile</a></li>
                        <li><a href="{{ URL::action('LogoutController@getIndex') }}?_token={{ csrf_token() }}">Logout</a></li>
                        @else
                        <li><a href="{{ URL::action('LoginController@getIndex') }}">Login</a></li>
                        <li><a href="{{ URL::action('RegisterController@getIndex') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        @if(!empty($error))
        <div class="row">
            <div class="large-12 columns">
                <div data-alert class="alert-box error">
                    {{{ $error }}}
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($info))
        <div class="row">
            <div class="large-12 columns">
                <div data-alert class="alert-box info">
                    {{{ $info }}}
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @include('partials.menu')
        </div>

		@if(!isset($hideNewsWidget))
        <div class="row wrapper">
            <div class="large-8 columns">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
            <div class="large-4 columns">
                @include('partials.news-widget')
            </div>
        </div>
        @else
		<div class="row wrapper">
            <div class="large-12 columns">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
        @endif

        <footer>
        	
        </footer>

        {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js", array('data-no-instant' => '')) }}
        {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js", array('data-no-instant' => '')) }}
        {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/foundation/5.1.1/js/foundation.min.js", array('data-no-instant' => '')) }}
        {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/instantclick/2.1.0/instantclick.min.js", array('data-no-instant' => '')) }}
        {{ HTML::script("js/imagelightbox.min.js", array('data-no-instant' => '')) }}
        {{ HTML::script("js/app.js", array('data-no-instant' => '')) }}

		<script type="text/javascript">
		  	var _gaq = _gaq || [];
		  	_gaq.push(['_setAccount', 'UA-48893973-1']);
		  	_gaq.push(['_trackPageview']);

		  	(function() {
		    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  	})();
		</script>
    </body>
</html>