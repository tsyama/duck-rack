<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    public function index()
    {
        $login_user = Auth::user();
        return view('Answers/index', compact('login_user'));
    }

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
        $login_user = Auth::user();
        if (!$login_user->answerQuestion($request->all())) {
            abort(500);
        }

        return redirect('/answers/create');
    }

    public function edit(Answer $answer)
    {
        if (!$answer->canPreview()) {
            abort(403);
        }
        $login_user = Auth::user();
        return view('Answers/edit', compact('answer', 'login_user'));
    }

    public function update(Answer $answer, Request $request)
    {
        if (!$answer->canPreview()) {
            abort(403);
        }
        $answer->fill($request->all());
        if (!$answer->save()) {
            abort(500);
        }
        return redirect('/answers');
    }

    public function preview(Answer $answer)
    {
        if (!$answer->canPreview()) {
            abort(403);
        }
        return view('Answers/preview', compact('answer'));
    }

    public function config(Request $request, Answer $answer)
    {
        if (!Auth::user()->hasAnswer($answer)) {
            abort(403);
        }
        $answer->fill($request->all());
        if (!$answer->save()) {
            abort(500);
        }
        return redirect('/answers');
    }

    public function destroy(Answer $answer)
    {
        if (!Auth::user()->hasAnswer($answer)) {
            abort(403);
        }
        if (!$answer->delete()) {
            abort(500);
        }
        return redirect('/answers');
    }
}
