<?php

namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'body',
        'question_id',
        'tweet_enabled_flag',
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
     * @return Answer|null
     */
    public static function getAnswerCanTweet()
    {
        $answers = Answer::where('tweet_enabled_flag', true)
            ->whereHas('user', function ($query) {
                $query->where('tweet_enabled_flag', true);
            })
            ->inRandomOrder();
        if (is_null($answers)) {
            return null;
        }
        return $answers->first();
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
     * 回答がツイート可能かどうか
     * @return bool
     */
    public function canTweet() : bool
    {
        if (!$this->tweet_enabled_flag) {
            return false;
        }
        if (!$this->user->tweet_enabled_flag) {
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
