<nav class="horizontal-scroller">
    <a href="{{ route('home') }}" class="tag-item {{ (Request::url('snippets')) === route('home') ? 'active' : '' }}">All</a>
    @foreach($tags as $tag)
        <a href="{{ route('tag.show', $tag->slug) }}" id="tag-{{ $tag->slug }}" class="tag-item {{ (Request::url('/snippets/' . $tag->name)) === route('tag.show', $tag->slug) ? 'active' : '' }}">{{ $tag->name }}</a>
    @endforeach
</nav>