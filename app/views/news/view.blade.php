@extends('template.default')

@section('pageName')
    News
@endsection

@section('content')
    <div class="row news">
        <div class="title">
            <h4>
                {{{ $news->title }}}
            </h4>
            <div class="large-12 columns content text-justify">
                {{ Markdown::string($news->content) }}
            </div>
            <div class="large-12 columns content">
                <span class="right less-important">
                    {{{ $news->created_at->diffForHumans() }}}
                </span>
            </div>
        </div>
    </div>
    <div class="margin-top"></div>
@endsection