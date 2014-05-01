@extends('template.default')

@section('pageName')
    Register
@endsection

@section('content')
	{{ Form::open(array('action' => 'RegisterController@postSubmit', 'autocomplete' => 'off')) }}
    
    <div class="row">
        <div class="title">
            <h4>Register</h4>
        </div>
        <div class="large-8 columns">
            {{ Form::text('username', null, array('class' => 'large-12 columns', 'placeholder' => 'Username')) }}
            <br /><br /><br />
            {{ Form::text('email', null, array('class' => 'large-12 columns', 'placeholder' => 'Email')) }}
            <br /><br /><br />
            {{ Form::password('password', array('class' => 'large-12 columns', 'placeholder' => 'Password')) }}
            <br /><br /><br />
            {{ Form::password('password_confirmation', array('class' => 'large-12 columns', 'placeholder' => 'Confirm')) }}
        </div>
        <div class="large-4 columns">
            {{ Form::submit('Register!', array('class' => 'small button right')) }}
            <div class="clear"></div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="large-12 columns">
            <span class="darker">Already have an account? </span>
            <a href="{{ URL::action('LoginController@getIndex') }}">Let's play!</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection