@extends('template.default')

@section('pageName')
    Error 500 - Internal server error
@endsection

@section('content')
    <div class="row">
        <div class="title">
            <h4>Error 500 - Internal server error</h4>
        </div>
        <div class="large-12 columns">
            <p>
                Woops... The server is having some problems. It may because our server is under heavy load, but luckily for you our team is already working on it!
            </p>
        </div>
    </div>
@endsection