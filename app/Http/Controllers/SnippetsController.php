<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Snippet;
use Carbon\Carbon;
use App\Contribution;
use Illuminate\Http\Request;
use App\Domain\TwitterClient;
use Illuminate\Support\Facades\Cache;

class SnippetsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        $snippets = Cache::remember('all-snippets' . '.page.' . request()->get('page', '1'), Carbon::now()->addWeek(2), function() {
            return Snippet::orderBy('created_at', 'DESC')->simplePaginate(10);
        });

        return view('snippets.index', compact('snippets', 'tags'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('snippets.create', compact('tags'));
    }

    public function fetchTweet(TwitterClient $twitterClient)
    {
        try {
            $response = $twitterClient->getTweet(request()->get('tweet_id'));
            return response()->json(['message' => 'Tweet was successfully found.', $response], 200);
        } catch(\Exception $e) {
            return response($e->getMessage(), 422);
        }
    }

    /**
     * @param TwitterClient $twitterClient
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TwitterClient $twitterClient)
    {
        $tags = request()->get('tags');

        $this->validate(request(), [
            'tags' => 'required|array|min:1',
            'text' => 'required',
            'tweet_id' => 'required|unique:snippets',
            'tweet_url' => 'required|url'
        ]);

        $snippet = Snippet::create([
            'image' => request()->get('image'),
            'referrer' => request()->get('referrer'),
            'text' => $this->wrapLinks(request()->get('text')),
            'tweet_id' => request()->get('tweet_id'),
            'user_image' => request()->get('user_image'),
            'user_name' => request()->get('user_name'),
            'screen_name' => request()->get('screen_name'),
            'tweet_url'  => request()->get('tweet_url'),
            'approved' => true
        ]);

        // Sync the tags with the snippet
        $snippet->tags()->sync($tags);

        // Clear the cache
        Cache::flush();

        return response()->json(['message' => 'The tweet was successfully created.']);
    }

    public function wrapLinks($text)
    {
        //Convert urls to <a> links
        $text = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $text);

        //Convert hashtags to twitter searches in <a> links
        $text = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $text);

        //Convert @tags to twitter profiles in <a> links
        $text = preg_replace("/@([A-Za-z0-9\/\.\_]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $text);

        return $text;
    }
}
