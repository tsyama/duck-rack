<?php

namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'body',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo('\App\Question');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * ツイート可能な回答を取得する
     * @return Answer
     */
    public static function getAnswerCanTweet() : Answer
    {
        return Answer::where('tweet_enabled_flag', true)
            ->inRandomOrder()
            ->first();
    }

    /**
     * 回答をツイートする
     * @return bool
     * @throws \Throwable
     */
    public function tweet() : bool
    {
        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $this->user->access_token,
            $this->user->access_token_secret
        );

        $tweet = view('tweet.body', ['answer' => $this]);
        $response = $twitter->post('statuses/update', [
            'status' => $tweet->render(),
        ]);

        if ($twitter->getLastHttpCode() !== 200) {
            dump($response);
            return false;
        }
        return true;
    }

    /**
     * 権限のない人でも閲覧できるかどうか
     * @return bool
     */
    public function canPreview() : bool
    {
        if (!$this->tweet_enabled_flag) {
            return false;
        }
        return true;
    }
}
