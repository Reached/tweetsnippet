<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonsController extends Controller
{
    public function show(Request $request)
    {
        $tags = Tag::all();
        $query = $request->get('query');

        $snippets = Snippet::orderBy('created_at', 'DESC')
            ->where('user_name','like','%'.$query.'%')
            ->orWhere('text','like','%'.$query.'%')
            ->simplePaginate(10);

        return view('snippets.search.show', compact('snippets', 'tags', 'query'));
    }
}
