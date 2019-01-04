<?php

namespace App\Http\Controllers;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TagsController extends Controller
{
    public function show($urlTag, Request $request)
    {
        $tags = Tag::all();

        $page = $request->get('page', '1');

        $tag = $tags->where('slug', $urlTag)
            ->load('snippets')
            ->first();

        $snippets = Cache::remember('tag.' . $tag->id . '.snippets' . '.page.' . $page, Carbon::now()->addWeek(2), function() use($tag) {
            return $tag->snippets()->orderBy('created_at', 'DESC')->simplePaginate(20);
        });

        return view('tags.show', compact('tag', 'tags', 'snippets'));
    }
}