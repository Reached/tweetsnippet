<?php

namespace App\Domain;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterClient {
    public function getTweet($id)
    {
        $res = $this->client()->get('statuses/show.json', ['query' => [
            'id' => $id,
            'tweet_mode' => 'extended'
        ]]);

        return json_decode($res->getBody());
    }

    public function sendMessage($twitterHandle, $message)
    {
        $res = $this->client()->post('direct_messages/new.json', ['query' => [
            'screen_name' => $twitterHandle,
            'text' => $message
        ]]);

        return json_decode($res->getBody());
    }

    private function getCredentials()
    {
        return new Oauth1([
            'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
            'token'           => env('TWITTER_ACCESS_TOKEN'),
            'token_secret'    => env('TWITTER_ACCESS_TOKEN_SECRET')
        ]);
    }

    private function client()
    {
        $stack = HandlerStack::create();
        $middleware = $this->getCredentials();

        $stack->push($middleware);

        return new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth',
        ]);
    }


}
