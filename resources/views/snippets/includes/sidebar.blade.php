<aside>
    <nav class="flex flex-col overflow-auto sticky pin-t w-64">
        <a href="{{ route('home') }}" class="tag-item all {{ active('home') }} py-4 w-full px-6 text-black flex items-center rounded-tr-full rounded-br-full transition">
            @svg('all', ['class' => 'h-8 w-8 mr-4'])
            All
        </a>
        @foreach($tags as $tag)
            <a class="tag-item {{ $tag->slug }} {{ active(route('tag.show', $tag->slug)) }} py-4 w-full px-6 text-black flex items-center rounded-tr-full rounded-br-full transition"
               href="{{ route('tag.show', $tag->slug) }}"
               id="tag-{{ $tag->slug }}">
                @svg($tag->slug, ['class' => 'h-8 w-8 mr-4'])
                {{ $tag->name }}
            </a>
        @endforeach
    </nav>
</aside>
