@extends('layouts.admin')

@section('title-tag')
    <title>Tweetsnippet - all snippets</title>
@endsection

@section('sidebar')

@endsection

@section('content')

    {{--<h1 class="headline-centered has-subtitle">{ All snippets }</h1>--}}
    {{--<h2 class="subtitle">Tweetsnippet is a curated list of tips and tricks from Twitter.</h2>--}}

    <div class="grid upper-grid">
        @include('snippets.includes.sidebar')
        <div class="grid">
            @forelse($snippets as $snippet)
                @include('snippets.includes.snippet')
            @empty
                <h3 class="headline-centered">No snippets exists in this category yet :(</h3>
            @endforelse
        </div>
        {{ $snippets->links() }}
    </div>



@endsection

@section('scripts')
    <script src="/js/lightbox.js"></script>
@endsection
