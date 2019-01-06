<article class="card flex flex-column box-shadow">
    <div class="flex align-center flex-between p-4">
        <div class="flex align-center max70">
            <div class="image-wrapper rounded m-r-1">
                <img src="{{ $snippet->user_image }}" alt="{{ $snippet->user_name }}">
            </div>
            <p class="m-b-0 max70">
                <strong>{{ $snippet->user_name }}</strong>
                <a href="https://twitter.com/{{ $snippet->screen_name }}"> {{ '@' . $snippet->screen_name }}</a>
            </p>
        </div>
        <a href="https://twitter.com/{{ $snippet->screen_name }}/status/{{ $snippet->tweet_id }}" class="align-self-top">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" xml:space="preserve" width="16" height="16"><g class="nc-icon-wrapper" fill="#AAB8C2"><path fill="#AAB8C2" d="M16,3c-0.6,0.3-1.2,0.4-1.9,0.5c0.7-0.4,1.2-1,1.4-1.8c-0.6,0.4-1.3,0.6-2.1,0.8c-0.6-0.6-1.5-1-2.4-1 C9.3,1.5,7.8,3,7.8,4.8c0,0.3,0,0.5,0.1,0.7C5.2,5.4,2.7,4.1,1.1,2.1c-0.3,0.5-0.4,1-0.4,1.7c0,1.1,0.6,2.1,1.5,2.7 c-0.5,0-1-0.2-1.5-0.4c0,0,0,0,0,0c0,1.6,1.1,2.9,2.6,3.2C3,9.4,2.7,9.4,2.4,9.4c-0.2,0-0.4,0-0.6-0.1c0.4,1.3,1.6,2.3,3.1,2.3 c-1.1,0.9-2.5,1.4-4.1,1.4c-0.3,0-0.5,0-0.8,0c1.5,0.9,3.2,1.5,5,1.5c6,0,9.3-5,9.3-9.3c0-0.1,0-0.3,0-0.4C15,4.3,15.6,3.7,16,3z"></path></g></svg>
        </a>
    </div>
    <p class="flex-full px-4 pb-0">{!! $snippet->text !!}</p>
    @if($snippet->image)
        <a href="{{ $snippet->image }}"
           data-jslghtbx="{{ $snippet->image }}"
           class="block-wrapper full-width"
           style="background-image: url({{ $snippet->image }})">
        </a>
    @endif
    <div class="toolbar flex align-center flex-between">
        <div class="m-0">
            <div class="tags">
                <div class="tags-list">
                    @foreach( $snippet->tags as $tag)
                        <a href="{{ route('tag.show', $tag->slug) }}"
                           class="toolbar-tag {{ (route('tag.show', $tag->slug) === Request::url('tag.show', $tag->slug)) ? 'active' : '' }}">{{ $tag->name }}@if (!$loop->last), @endif</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex align-center">
            <time datetime="{{ $snippet->created_at }}" class="m-r-1"><strong>{{ $snippet->created_at->diffForHumans() }}</strong></time>
            <a href="https://twitter.com/intent/retweet?tweet_id={{ $snippet->tweet_id }}" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 72">
                    <path d="M70.676 36.644C70.166 35.636 69.13 35 68 35h-7V19c0-2.21-1.79-4-4-4H34c-2.21 0-4 1.79-4 4s1.79 4 4 4h18c.552 0 .998.446 1 .998V35h-7c-1.13 0-2.165.636-2.676 1.644-.51 1.01-.412 2.22.257 3.13l11 15C55.148 55.545 56.046 56 57 56s1.855-.455 2.42-1.226l11-15c.668-.912.767-2.122.256-3.13zM40 48H22c-.54 0-.97-.427-.992-.96L21 36h7c1.13 0 2.166-.636 2.677-1.644.51-1.01.412-2.22-.257-3.13l-11-15C18.854 15.455 17.956 15 17 15s-1.854.455-2.42 1.226l-11 15c-.667.912-.767 2.122-.255 3.13C3.835 35.365 4.87 36 6 36h7l.012 16.003c.002 2.208 1.792 3.997 4 3.997h22.99c2.208 0 4-1.79 4-4s-1.792-4-4-4z"/>
                </svg>
            </a>
        </div>
    </div>
</article>