@extends('layouts.admin')

@section('body-classes')regular-page @endsection

@section('title-tag')
    <title>Contribute - Tweetsnippet</title>
@endsection

@section('content')
    <h1 class="headline-centered has-subtitle">{ Contribute }</h1>
    <h2 class="subtitle">Found an awesome snippet in the Twitterverse? Share it with us!</h2>

    <div class="card p-1 text-card">
        <p>Just paste in the snippet url and submit it, optionally you can provide your Twitter handle. <strong>Please note that I only accept quality snippets!</strong></p>
        <form action="{{ route('contribute.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="grid two-columns p-0">
                <div class="form-group">
                    <label for="snippet_url">Snippet url <span style="color: red;">*</span></label>
                    <input type="text" id="snippet_url" name="snippet_url" placeholder="https://twitter.com/adamwathan/status/875069941883564032">
                    <span class="error-message">{{ $errors->first('snippet_url') }}</span>
                </div>

                <div class="form-group">
                    <label for="referrer">Your own Twitter handle (optional)</label>
                    <input type="text" id="referrer" name="referrer" placeholder="@RealMthrRussia">
                </div>
            </div>
            <button type="submit" class="button">Submit snippet</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection