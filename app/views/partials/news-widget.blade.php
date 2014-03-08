<div class="large-12" id="sidebar">
    <div class="title">
        <h4>Latest news</h4>
    </div>
    @foreach($news as $thisNews)
    <a href="#">
        <div class="content">
            {{{ $thisNews->title }}}
            <div class="infos">
                {{{ $thisNews->created_at->diffForHumans() }}}
            </div>
        </div>
    </a>
    @endforeach
</div>