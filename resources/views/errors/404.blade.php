@extends('layouts.admin')

@section('content')
    <h1 class="headline-centered">{ Oops 404 - this page does not exist }</h1>
    <div class="card text-card">
        <h2 class="centered-link">Looks like you managed to find a page that does not yet exist. Are you looking for <a href="{{ route('home') }}">snippets?</a></h2>
    </div>
@endsection