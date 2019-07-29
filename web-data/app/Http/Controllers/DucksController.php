<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Http\Request;

class DucksController extends Controller
{
    public function create(Request $request)
    {
        $access_token = $request->session()->get('access_token');

        $connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            $access_token['oauth_token'],
            $access_token['oauth_token_secret']
        );

        $login_user = $connection->get('account/verify_credentials');
        if (!isset($login_user->id)) {
            return redirect('/logout');
        }

        return view('Ducks/create', ['login_user' => $login_user]);
    }
}
