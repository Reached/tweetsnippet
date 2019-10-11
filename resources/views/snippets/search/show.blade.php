@extends('layouts.admin')

@section('title-tag')
    <title>You searched for {{ $query }}</title>
@endsection

@section('horizontal-scroller')
    @include('snippets.includes.horizontal-scroller')
@endsection

@section('content')

<h1 class="headline-centered">Snippets matching <strong>{{ $query }}</strong></h1>

<div class="grid">
    @forelse($snippets as $snippet)
        @include('snippets.includes.snippet')
    @empty
        <h3 class="headline-centered">We found no snippets matching your query, <a href="#" class="search-button">try a new one</a></h3>
        {{--<a href="{{ route('contribute') }}" class="centered-link">You can contribute here</a>--}}
    @endforelse
</div>

{{ $snippets->links() }}
@endsection

@section('scripts')
    <script src="/js/lightbox.min.js"></script>
@endsection
