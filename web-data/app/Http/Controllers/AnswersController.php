<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    public function create()
    {
        $login_user = Auth::user();
        if (!isset($login_user->id)) {
            return redirect('/logout');
        }

        $question = $login_user->getNotAnsweredQuestion();

        return view('Answers/create', compact('login_user', 'question'));
    }

    public function store(Request $request)
    {
        $answer = new Answer();
        $answer->fill($request->all());
        $answer->user_id = Auth::user()->id;
        if (!$answer->save()) {
            abort(500);
        }

        return redirect('/answers/create');
    }
}
