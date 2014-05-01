@extends('template.default')

@section('pageName')
    Settings
@endsection

@section('content')
	{{ Form::open(array('action' => 'UserController@postSettings', 'autocomplete' => 'off')) }}
    
    <div class="row">
        <div class="title">
            <h4>Change your username or password</h4>
        </div>
        <div class="large-8 columns">
            {{ Form::text('username', Auth::user()->username, array('class' => 'large-12 columns', 'placeholder' => 'New username')) }}
            <br><br><br>
            {{ Form::text('password_old', null, array('class' => 'large-12 columns', 'placeholder' => 'Current password')) }}
            <br><br><br>
            {{ Form::text('password_new', null, array('class' => 'large-12 columns', 'placeholder' => 'New password')) }}
            <br><br><br>
            {{ Form::text('password_new_confirmation', null, array('class' => 'large-12 columns', 'placeholder' => 'Confirm')) }}
        </div>
        <div class="large-4 columns">
            {{ Form::submit('Save!', array('class' => 'small button right')) }}
            <div class="clear"></div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="large-12 columns">
            <span class="darker">Make sure to keep your password safe!</span>
        </div>
    </div>

    {{ Form::close() }}
@endsection