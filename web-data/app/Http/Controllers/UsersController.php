<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    const TWITTER_OAUTH_CALLBACK = 'http://local.duck-rack.com/user/callback/';
    public function login(Request $request)
    {
        $connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET')
        );
        $request_token = $connection->oauth('oauth/request_token', [
            'oauth_callback' => self::TWITTER_OAUTH_CALLBACK
        ]);

        $request->session()->put('oauth_token', $request_token['oauth_token']);
        $request->session()->put('oauth_token_secret', $request_token['oauth_token_secret']);

        $url = $connection->url('oauth/authenticate', [
            'oauth_token' => $request_token['oauth_token']
        ]);

        return redirect($url);
    }

    public function callback(Request $request)
    {
        if ($request->oauth_token !== $request->session()->get('oauth_token')) {
            abort(403);
        }

        $connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            $request->session()->get('oauth_token'),
            $request->session()->get('oauth_token_secret')
        );

        $access_token = $connection->oauth('oauth/access_token', [
            'oauth_verifier' => $request->oauth_verifier
        ]);
        $request->session()->put('access_token', $access_token);

        return redirect('/ducks/create');
    }
}
