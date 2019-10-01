@extends('layouts.admin')

@section('title-tag')
    <title>{{ $tag->name }} snippets - Tweetsnippet</title>
@endsection

@section('content')
    @section('horizontal-scroller')
        @include('snippets.includes.horizontal-scroller')
    @endsection

    <h1 class="headline-centered">{{ '{ ' . $tag->name }} snippets }</h1>

    <div class="grid {{ ($snippets->count() === 0) ? 'no-items' : '' }}">
        @forelse($snippets as $snippet)
            @include('snippets.includes.snippet')
        @empty
            <h3 class="headline-centered">No snippets exists with this tag yet :(</h3>
            <a href="{{ route('contribute.create') }}" class="centered-link">You can contribute here</a>
        @endforelse
    </div>

    {{ $snippets->links() }}
@endsection

@section('scripts')
    <script src="/js/lightbox.min.js"></script>
@endsection
