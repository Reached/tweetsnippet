@extends('layouts.admin')

@section('body-classes')regular-page @endsection

@section('content')
    <h1 class="headline-centered">{Create snippet}</h1>

    <a href="{{ route('contribute.index') }}">To contributions</a>

    <create-snippet
            :prop-tags="{{ $tags }}"
            prop-snippet-url="{{ Session::get('snippet_url') }}"
            prop-referrer="{{ Session::get('referrer') }}"
            prop-contribution-id="{{ Session::get('contribution_id') }}">
    </create-snippet>
@endsection

@section('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection