@extends('template.default')

@section('pageName')
    Home
@endsection

@section('content')
    @foreach($news as $thisNews)
    <div class="row">
        <div class="title">
            <h4>
                {{{ $thisNews->title }}}
            </h4>
            <div class="large-12 columns content">
                {{{ $thisNews->preview }}}
            </div>
            <div class="large-12 columns content">
                <span class="right less-important">
                    {{{ $thisNews->created_at->diffForHumans() }}}
                </span>
            </div>
        </div>
    </div>
    <div class="margin-top"></div>
    @endforeach

    {{ $news->links() }}
@endsection