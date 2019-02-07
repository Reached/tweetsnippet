<aside>
    <nav class="flex flex-col">
        <a href="{{ route('home') }}" class="tag-item all {{ active('home') }} py-4 w-full px-6 text-brand-darkest ">All</a>
        @foreach($tags as $tag)
            <a class="tag-item {{ $tag->slug }} {{ active(route('tag.show', $tag->slug)) }} py-4 w-full px-6 text-brand-darkest " href="{{ route('tag.show', $tag->slug) }}" id="tag-{{ $tag->slug }}">{{ $tag->name }}</a>
        @endforeach
    </nav>
</aside>
