<aside class="sidebar card box-shadow mr-4">
    <h3 class="header">Top contributors</h3>
    <div class="p-1">
        @if(isset($contributors))
            @foreach($contributors as $contributor)
                @foreach($contributor as $c)
                    <li><span class="count">{{ $c['count'] }}</span><a href="{{ 'https://twitter.com/' . $c['handle'] }}">{{ $c['handle'] }}</a></li>
                @endforeach
            @endforeach
        @else
            <div class="pt-3 text-center">No contributors found.</div>
        @endif
    </div>
</aside>
