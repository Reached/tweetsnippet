<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;

class Snippet extends Model implements Feedable
{
    protected $guarded = ['id'];
    protected $casts = ['approved' => 'boolean'];

    public static function getFeedItems()
    {
        return self::limit(30)->orderBy('updated_at','desc')->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->text)
            ->summary($this->text)
            ->updated($this->updated_at)
            ->link($this->tweet_url)
            ->author($this->user_name);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getFeedItemId()
    {
        return $this->tweet_id;
    }

    public function getFeedItemTitle()
    {
        return $this->title;
    }

    public function getFeedItemSummary() : string
    {
        return $this->text;
    }

    public function getFeedItemUpdated()
    {
        return $this->updated_at;
    }

    public function getFeedItemLink() : string
    {
        return action('TagsController@show', [$this->url]);
    }

    public function getFeedItemAuthor() : string
    {
        return $this->user_name;
    }

    public function getLaravelFeed()
    {
        $tag = Tag::where('slug', 'laravel')
            ->firstOrFail();

        return $tag->snippets()->orderBy('created_at', 'DESC')->get();
    }

    public function getJavascriptFeed()
    {
        $tag = Tag::where('slug', 'javascript')
            ->firstOrFail();

        return $tag->snippets()->orderBy('created_at', 'DESC')->get();
    }

    public function getEsFeed()
    {
        $tag = Tag::where('slug', 'es6')
            ->firstOrFail();

        return $tag->snippets()->orderBy('created_at', 'DESC')->get();
    }

    public function getCssFeed()
    {
        $tag = Tag::where('slug', 'css')
            ->firstOrFail();

        return $tag->snippets()->orderBy('created_at', 'DESC')->get();
    }
}
