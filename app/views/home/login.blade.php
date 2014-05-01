@extends('template.default')

@section('pageName')
    Login
@endsection

@section('content')
	{{ Form::open(array('action' => 'LoginController@postSubmit', 'autocomplete' => 'off')) }}
    
    <div class="row">
        <div class="title">
            <h4>Login</h4>
        </div>
        <div class="large-8 columns">
            {{ Form::text('email', null, array('class' => 'large-12 columns', 'placeholder' => 'Email')) }}
            <br /><br /><br />
            {{ Form::password('password', array('class' => 'large-12 columns', 'placeholder' => 'Password')) }}
        </div>
        <div class="large-4 columns">
            {{ Form::submit('Login!', array('class' => 'small button right')) }}
            <div class="clear"></div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="large-12 columns">
            <span class="darker">Are you ready to enter the Deimos experience? </span>
            <a href="{{ URL::action('RegisterController@getIndex') }}">Register now!</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection