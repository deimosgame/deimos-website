<div class="large-12" id="sidebar">
    <div class="title">
        <h4>Latest news</h4>
    </div>
    @foreach($news as $thisNews)
    <div class="content">
        {{{ $thisNews->title }}}
        <div class="infos">
            {{{ $thisNews->created_at }}}
        </div>
    </div>
    @endforeach
</div>