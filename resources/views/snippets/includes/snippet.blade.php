<article class="card flex flex-col shadow-lg rounded-lg">
    <div class="main-content flex-1">
        <div class="flex items-center flex-between pt-4 px-4 pb-4">
            <div class="flex items-center">
                <div class="image-wrapper rounded-lg mr-4">
                    <img src="{{ $snippet->user_image }}" alt="{{ $snippet->user_name }}">
                </div>
                <p class="mb-0 flex flex-col">
                    <strong class="text-grey-darkest">{{ $snippet->user_name }}</strong>
                    <a class="text-sm" href="https://twitter.com/{{ $snippet->screen_name }}"> {{ '@' . $snippet->screen_name }}</a>
                </p>
            </div>
            <a href="https://twitter.com/{{ $snippet->screen_name }}/status/{{ $snippet->tweet_id }}" class="align-self-top">
                <svg class="w-6 h-6" version="1.1" viewBox="0 0 48 48" xml:space="preserve" width="48" height="48"><title>logo twitter</title><g><path fill="#69ACE0" d="M48,9.11341c-1.76603,0.78322-3.66389,1.31268-5.65607,1.55067 c2.03332-1.21873,3.5948-3.14867,4.33001-5.44828c-1.90268,1.12855-4.01024,1.94811-6.25344,2.3898 c-1.79636-1.914-4.35574-3.10992-7.18805-3.10992c-5.43885,0-9.84807,4.40923-9.84807,9.84756 c0,0.77191,0.0871,1.5234,0.25495,2.24422c-8.1844-0.41065-15.4407-4.33121-20.29778-10.28923 C2.49387,7.75272,2.0083,9.44432,2.0083,11.24909c0,3.41649,1.73858,6.43073,4.38093,8.19676 c-1.61427-0.05109-3.13272-0.49415-4.4605-1.23177c-0.00069,0.04115-0.00084,0.08231-0.00084,0.1238 c0,4.77144,3.39452,8.75168,7.8996,9.6563c-0.82642,0.22494-1.69641,0.34532-2.5945,0.34532 c-0.63458,0-1.25149-0.06173-1.8528-0.17661c1.25319,3.91234,4.89001,6.75958,9.19929,6.83914 c-3.37036,2.64116-7.61654,4.21549-12.23032,4.21549C1.55427,39.21751,0.77036,39.17088,0,39.08 c4.35814,2.79408,9.53447,4.42431,15.09573,4.42431c18.11374,0,28.0189-15.00571,28.0189-28.01916 c0-0.42694-0.00959-0.85164-0.02846-1.27394C45.01011,12.82274,46.67978,11.08826,48,9.11341z"></path></g></svg>
            </a>
        </div>
        <p class="px-4 pb-4 text-grey-dark">{!! $snippet->text !!}</p>
    </div>
    <div class="bottom-content">
        @if($snippet->image)
            <a class="h-64 block lightbox-item" data-caption="{{ $snippet->text }}" href="{{ $snippet->image }}">
                <img class="object-cover h-64 object-center" src="{{ $snippet->image }}"
                     alt="A {{ $tags->first()->name }} snippet by ({{ $snippet->user_name }}) {{ $snippet->screen_name }}">
            </a>
        @endif
        <div class="flex align-center flex-between rounded-br-lg rounded-bl-lg p-4">
            <div class="m-0">
                <div class="tags">
                    <div class="tags-list">
                        @foreach( $snippet->tags as $tag)
                            <a href="{{ route('tag.show', $tag->slug) }}"
                               class="text-sm {{ (route('tag.show', $tag->slug) === Request::url('tag.show', $tag->slug)) ? 'active' : '' }}">{{ $tag->name }}@if (!$loop->last), @endif</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex align-center">
                <time class="text-sm text-grey-dark" datetime="{{ $snippet->created_at }}"><strong>{{ $snippet->created_at->diffForHumans() }}</strong></time>
                <a href="https://twitter.com/intent/retweet?tweet_id={{ $snippet->tweet_id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 72">
                        <path d="M70.676 36.644C70.166 35.636 69.13 35 68 35h-7V19c0-2.21-1.79-4-4-4H34c-2.21 0-4 1.79-4 4s1.79 4 4 4h18c.552 0 .998.446 1 .998V35h-7c-1.13 0-2.165.636-2.676 1.644-.51 1.01-.412 2.22.257 3.13l11 15C55.148 55.545 56.046 56 57 56s1.855-.455 2.42-1.226l11-15c.668-.912.767-2.122.256-3.13zM40 48H22c-.54 0-.97-.427-.992-.96L21 36h7c1.13 0 2.166-.636 2.677-1.644.51-1.01.412-2.22-.257-3.13l-11-15C18.854 15.455 17.956 15 17 15s-1.854.455-2.42 1.226l-11 15c-.667.912-.767 2.122-.255 3.13C3.835 35.365 4.87 36 6 36h7l.012 16.003c.002 2.208 1.792 3.997 4 3.997h22.99c2.208 0 4-1.79 4-4s-1.792-4-4-4z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</article>