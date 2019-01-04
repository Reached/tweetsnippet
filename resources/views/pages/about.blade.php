@extends('layouts.admin')

@section('body-classes')regular-page @endsection

@section('title-tag')
    <title>About - Tweetsnippet</title>
@endsection

@section('content')
    <h1 class="headline-centered">{About Tweetsnippet}</h1>
    <div class="card p-2 text-card">
        <p>Hi there!</p>
        <p>I'll try to make this as short as possible since I know how valuable your time is. I tend to browse Twitter a 3-4 times a day
            and often I will stumble upon little pieces of code, tips & tricks for my code editor, good marketing advice or the like. I usually
            like the post or retweet it, but often I find it hard to keep track of all of these little goodies that are spread across the Twitterverse.
            This is the reason I created Tweetsnippet - to gather all of these little snippets of information in a single place, primarily for myself,
            but if it helps someone out there on the great internet, I am more than happy :).
        </p>
        <p>A huge thanks goes out to all of the happy Tweeters who make this possible by posting all of their best tips & tricks and great advice on Twitter.
            Another great thanks goes out to Twitter for making their API publicly accessible, and also for making a great suite of application that helps
            many people every day.
        </p>

        <p>Happy tweeting!</p>
        <p><strong>Casper Sørensen</strong> - <a href="https://twitter.com/realmthrrussia">@RealMthrRussia</a></p>
    </div>
@endsection