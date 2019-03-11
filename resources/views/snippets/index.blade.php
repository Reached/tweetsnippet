@extends('layouts.admin')

@section('title-tag')
    <title>Tweetsnippet - all snippets</title>
@endsection

@section('sidebar')

@endsection

@section('content')

    <div class="grid main-grid">
        <div>
            @include('snippets.includes.sidebar')
        </div>
        <div>
            <h1 class="headline-centered max-w-xl text-4xl mx-auto mb-0 pb-0">Welcome to <span class="text-brand-dark">Tweetsnippet</span></h1>
            <h2 class="subtitle text-grey-dark text-2xl">A curated list of tips and tricks from Twitter.</h2>

            <div class="grid inner-grid {{ ($snippets->count() === 0) ? 'no-items' : '' }}">
                @forelse($snippets as $snippet)
                    @include('snippets.includes.snippet')
                @empty
                    <h3 class="headline-centered">No snippets exists yet :(</h3>
                    <a href="{{ route('contribute.create') }}" class="centered-link">You can contribute here</a>
                @endforelse
            </div>
        </div>

    </div>

    <h1 class="headline-centered has-subtitle">{ All snippets }</h1>

    <div class="grid upper-grid">
        @include('snippets.includes.sidebar')
        <div class="grid main-grid">
            @forelse($snippets as $snippet)
                @include('snippets.includes.snippet')
            @empty
                <h3 class="headline-centered">No snippets exists in this category yet :(</h3>
            @endforelse
        </div>

    </div>
    {{ $snippets->links() }}


@endsection

@section('scripts')
    <script src="/js/lightbox.js"></script>
@endsection
