<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DucksController extends Controller
{
    public function create()
    {
        $login_user = Auth::user();
        if (!isset($login_user->id)) {
            return redirect('/logout');
        }

        $question = $login_user->getNotAnsweredQuestion();

        return view('Ducks/create', compact('login_user', 'question'));
    }
}
