<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Notifications\ContributionMade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ContributionsController extends Controller
{
    public function index()
    {
        $contributions = Contribution::where('approved', false)->get();

        return view('contributions.index', compact('contributions'));
    }

    public function create()
    {
        return view('contributions.create');
    }

    public function store()
    {
        $this->validate(request(), [
            //'g-recaptcha-response' => 'required|captcha',
            'snippet_url' => 'required|url|unique:snippets,tweet_url|unique:contributions,snippet_url'
        ]);

        $contribution = Contribution::create([
            'snippet_url' => request()->get('snippet_url'),
            'referrer' => request()->get('referrer')
        ]);

        Session::flash('message', 'Thank you! Your snippet was successfully sent, I will review it shortly :)');

//         Notification::send($contribution, new ContributionMade($contribution));

        return redirect()->back();
    }

    public function storeSnippetInfo()
    {
        $snippetUrl = \request()->get('snippet_url');
        $referrer = \request()->get('referrer');
        $contributionId = \request()->get('id');

        request()->session()->flash('snippet_url', $snippetUrl);
        request()->session()->flash('referrer', $referrer);
        request()->session()->flash('contribution_id', $contributionId);

        return redirect()->route('snippet.create');
    }
}
