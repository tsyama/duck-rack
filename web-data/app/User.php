<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Socialite\Facades\Socialite;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * SocialiteユーザーエンティティからUserエンティティを生成する。
     * すでにアカウントがある場合はfind, ない場合はcreateする。
     * @param \Laravel\Socialite\One\User $socialite_user
     * @return User
     */
    public static function getUserFromSocialite(\Laravel\Socialite\One\User $socialite_user) : User
    {
        $user = self::find($socialite_user->id);
        if (!$user) {
            $user = self::createUserFromSocialite($socialite_user);
        }
        return $user;
    }

    /**
     * Socialiteユーザーエンティティをもとにユーザー情報を登録し、Userエンティティを生成する
     * @param $socialite_user
     * @return User
     */
    public static function createUserFromSocialite($socialite_user) : User
    {
        $user = new User((array)$socialite_user);
        $user->id = $socialite_user->id;
        $user->access_token = $socialite_user->token;
        $user->access_token_secret = $socialite_user->tokenSecret;
        $user->save();

        return $user;
    }

    /**
     * UserエンティティからSocialiteユーザーエンティティを取得する
     * @return \Laravel\Socialite\One\User
     */
    public function getSocialiteUser() : \Laravel\Socialite\One\User
    {
        $socialite_user = Socialite::driver('twitter')->userFromTokenAndSecret(
            $this->access_token,
            $this->access_token_secret
        );
        return $socialite_user;
    }
}
