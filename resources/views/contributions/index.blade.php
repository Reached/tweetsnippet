@extends('layouts.admin')

@section('content')
    <h1 class="headline-centered">Contributions</h1>

    <div class="card text-card p-2">
        <table>
            <tbody>
            <tr>
                <th>Snippet URL</th>
                <th>Referrer</th>
            </tr>
                @foreach($contributions as $contribution)
                    <tr>
                        <td><a href="{{ $contribution->snippet_url }}" class="open-window">{{ $contribution->snippet_url }}</a></td>
                        <td>{{ $contribution->referrer }}</td>
                        <td>
                            <form action="{{ route('storeSnippetInfo') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $contribution->id }}">
                                <input type="hidden" name="snippet_url" value="{{ $contribution->snippet_url }}">
                                <input type="hidden" name="referrer" value="{{ $contribution->referrer }}">
                                <button type="submit" class="button">Create snippet with info</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        var links = document.querySelectorAll('.open-window');

        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.open(this.href);
            });
        });
    </script>
@endsection