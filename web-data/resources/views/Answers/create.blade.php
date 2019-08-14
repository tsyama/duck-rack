@extends('layouts.duck-rack')

@section('content')
    {{ Form::open(['url' => '/answers/', 'method' => 'POST']) }}
    {{ csrf_field() }}
    <div>
        <div>
            <img class="duck-icon" src="/img/duck-icon.jpg">
        </div>
        <p class="lead">
            {{ $question->body }}
        </p>
    </div>
    <p>
        <textarea name="body" class="form-control" rows="5"></textarea>
    </p>
    <div>
        <div>
            <a href="/answers/create" class="btn btn-lg btn-danger pull-left answer-btn">
                他の質問
            </a>
            <button type="submit" class="btn btn-lg btn-success pull-right answer-btn">答える</button>
        </div>
    </div>
    <input type="hidden" name="question_id" value="{{ $question->id }}">
    {{ Form::close() }}
@endsection
