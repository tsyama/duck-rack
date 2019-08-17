<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UsersController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            return redirect('/answers/create');
        }
        return Socialite::driver('twitter')->redirect();
    }

    public function callback()
    {
        if (!$socialite_user = Socialite::driver('twitter')->user()) {
            abort(403);
        }
        $user = User::getUserFromSocialite($socialite_user);
        Auth::login($user);

        return redirect('/answers/create');
    }

    public function config()
    {
        $login_user = Auth::user();
        return view('Users.config', compact('login_user'));
    }

    public function configUpdate(Request $request)
    {
        $login_user = Auth::user();
        $login_user->fill($request->all());
        if (!$login_user->save()) {
            abort(500);
        }
        return redirect('/users/config');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
