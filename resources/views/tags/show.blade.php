@extends('layouts.admin')

@section('title-tag')
    <title>{{ $tag->name }} snippets - Tweetsnippet</title>
@endsection

@section('content')


    <div class="grid main-grid">
        <div>
            @include('snippets.includes.sidebar')
        </div>
        <div>
            <h1 class="headline-centered">{!! '{ <span class="text-brand-dark">' . $tag->name . '</span>' !!}</span> snippets }</h1>
            <div class="grid inner-grid {{ ($snippets->count() === 0) ? 'no-items' : '' }}">
                @forelse($snippets as $snippet)
                    @include('snippets.includes.snippet')
                @empty
                    <h3 class="headline-centered">No snippets exists with this tag yet :(</h3>
                    <a href="{{ route('contribute.create') }}" class="centered-link">You can contribute here</a>
                @endforelse
            </div>
        </div>

    </div>

    {{ $snippets->links() }}



@endsection

@section('scripts')
    <script src="/js/lightbox.js"></script>
@endsection
