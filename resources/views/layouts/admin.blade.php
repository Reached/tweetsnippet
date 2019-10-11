<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    @yield('title-tag')
    <meta name="description" content="A curated list of useful snippets, tips and tricks posted on Twitter.">
    <meta name="author" content="Casper Sørensen">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')
    <link rel="stylesheet" defer href="{{ mix('/css/app.css') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @include('feed::links')
</head>

<body class="header-is-fixed @yield('body-classes')">
    <div id="app">
        @yield('lightbox')
        <header class="fixed-header">
            <nav class="main-navigation">
                <a href="/" class="logo">Tweet <span class="logotype">{snippet}</span></a>
                <div class="links admin">
                    <a href="{{ route('contribute.create') }}" class="{{ (Request::url('contribute')) === route('contribute.create') ? 'active' : '' }}">Contribute</a>
                    <a href="{{ route('home') }}" class="{{ (Request::url('/')) === route('home') ? 'active' : '' }}">Snippets</a>
                    <a href="{{ route('about') }}" class="{{ (Request::url('about')) === route('about') ? 'active' : '' }}">About</a>
                    <button class="button search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><g class="nc-icon-wrapper" fill="#FFF"><path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"/><path data-color="color-2" d="M15.707 14.293L13.314 11.9c-.41.53-.885 1.003-1.414 1.414l2.393 2.393c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414z"/></g></svg>
                    </button>
                    @if(Auth::check())
                        <a href="{{ route('snippet.create') }}" class="{{ (Request::url('snippet.create')) === route('snippet.create') ? 'active' : '' }}">Create snippet</a>
                        <form method="POST" action="/logout">
                            {{ csrf_field() }}
                            <button type="submit" class="button">Log out</button>
                        </form>
                    @endif
                </div>
            </nav>

            <div class="search-overlay">
                <button class="close-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M22.7 4.3l-3-3c-.4-.4-1-.4-1.4 0L12 7.6 5.7 1.3c-.4-.4-1-.4-1.4 0l-3 3c-.4.4-.4 1 0 1.4L7.6 12l-6.3 6.3c-.4.4-.4 1 0 1.4l3 3c.4.4 1 .4 1.4 0l6.3-6.3 6.3 6.3c.2.2.5.3.7.3s.5-.1.7-.3l3-3c.4-.4.4-1 0-1.4L16.4 12l6.3-6.3c.4-.4.4-1 0-1.4z" class="nc-icon-wrapper" fill="#FFF"/></svg>
                </button>
                <form action="{{ route('person.show', 'Peter Thiel') }}" method="GET">
                    <input type="search" name="query" class="search-input" placeholder="Search here...">
                </form>
            </div>

            @yield('horizontal-scroller')
        </header>

        @if (Session::has('message'))
            <div class="alert">{{ Session::get('message') }}</div>
        @endif

        @yield('content')
    </div>

    @include('layouts.includes.footer')
    @yield('scripts')
    <script>
        window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
        ga('create', '{{ env('GA_KEY') }}', 'auto');
        ga('send', 'pageview');

        var searchOverlay = document.querySelector('.search-overlay');
        var searchButtons = document.querySelectorAll('.search-button');

        searchButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                searchOverlay.classList.add('shown');

                setTimeout(function() {
                    document.querySelector('.search-input').focus();
                }, 100);
            });
        });

        document.querySelector('.search-overlay .close-button').addEventListener('click', function() {
            searchOverlay.classList.remove('shown');

        });
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
</body>
</html>
