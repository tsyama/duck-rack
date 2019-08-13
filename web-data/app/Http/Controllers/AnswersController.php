<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    public function store(Request $request)
    {
        $answer = new Answer();
        $answer->fill($request->all());
        $answer->user_id = Auth::user()->id;
        if (!$answer->save()) {
            abort(500);
        }

        return redirect('/ducks/create');
    }
}
