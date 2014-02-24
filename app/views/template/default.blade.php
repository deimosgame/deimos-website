<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Deimos Portal - @yield('pageName')</title>
        {{ HTML::style("//fonts.googleapis.com/css?family=Lato:300") }}
        {{ HTML::style("css/app.css") }}
        <script src="bower_components/modernizr/modernizr.js"></script>
    </head>
    <body>

        <header>
            <img src="images/logo.png" id="logo">
        </header>

        <div class="row">
            <h1 class="large-8 columns">
                <div class="content">
                    @yield('pageName')
                </div>
                <div class="border"></div>
            </h1>
            <div class="large-4 columns">
                <div class="right" style="margin-top: 30px;">
                    <a href="#" class="split-button">Your profile <span data-dropdown="drop"></span></a><br>
                    <ul id="drop" class="f-dropdown" data-dropdown-content>
                        @if(Auth::check())
                        <li><a href="#">See my profile</a></li>
                        <li><a href="{{ URL::action('LogoutController@getIndex') }}">Logout</a></li>
                        @else
                        <li><a href="{{ URL::action('LoginController@getIndex') }}">Login</a></li>
                        <li><a href="{{ URL::action('RegisterController@getIndex') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        @if(!empty($message))
        <div class="row">
            <div class="large-12 columns">
                <div data-alert class="alert-box error">
                    {{{ $message }}}
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @include('partials.menu')
        </div>

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

        {{ HTML::script("bower_components/jquery/jquery.js") }}
        {{ HTML::script("bower_components/foundation/js/foundation.min.js") }}
        {{ HTML::script("js/app.js") }}
    </body>
</html>