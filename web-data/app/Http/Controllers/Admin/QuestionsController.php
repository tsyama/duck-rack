<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('Admin/Questions/index', compact('questions'));
    }

    public function create()
    {
        return view('Admin/Questions/create');
    }

    public function store(Request $request)
    {
        $question = new Question($request->all());
        if (!$question->save()) {
            abort(500, 'Failed to save question');
        }
        return redirect('/admin/questions');
    }

    public function edit(Question $question)
    {
        return view('Admin/Questions/edit', compact('question'));
    }

    public function update(Question $question, Request $request)
    {
        $question->fill($request->all());
        if (!$question->save()) {
            abort(500, 'Failed to save question');
        }

        return redirect('/admin/questions/' . $question->id . '/edit');
    }

    public function destroy(Question $question)
    {
        if (!$question->delete())
        {
            abort(500, 'Failed to delete question');
        }
        return redirect('admin/questions');
    }
}
