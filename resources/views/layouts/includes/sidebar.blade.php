<aside class="sidebar card flex flex-column box-shadow">
    <h3 class="header">Top contributors</h3>
    <div class="p-1">
        @foreach($contributors as $contributor)
            @foreach($contributor as $c)
                <li><span class="count">{{ $c['count'] }}</span><a href="{{ 'https://twitter.com/' . $c['handle'] }}">{{ $c['handle'] }}</a></li>
            @endforeach
        @endforeach
    </div>
</aside>