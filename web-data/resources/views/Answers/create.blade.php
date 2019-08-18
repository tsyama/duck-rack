@extends('layouts.duck-rack')

@section('content')
    {{ Form::open(['url' => '/answers/', 'method' => 'POST']) }}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12 mx-auto">
            <img class="duck-icon" src="/img/duck-icon.jpg">
        </div>
    </div>
    @if($question)
        <div class="row">
            <div class="col-12">
                <p class="lead">
                    {{ $question->body }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <textarea name="body" class="form-control" rows="5"></textarea>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="/answers/create" class="btn btn-lg btn-danger pull-left answer-btn">
                    他の質問
                </a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-lg btn-success pull-right answer-btn">答える</button>
            </div>
        </div>
        <input type="hidden" name="question_id" value="{{ $question->id }}">
    @else
        <div class="row">
            <div class="col-12">
                <p class="lead">すべての質問に回答済みです😮</p>
            </div>
        </div>
    @endif
    {{ Form::close() }}
    <div class="row answer-row" style="margin-top: 30px">
        <div class="col-2 d-flex align-items-center">
            <img class="duck-icon answer-icon img-fluid mx-auto" src="/img/duck-icon.jpg">
        </div>
        <div class="col-9 d-flex align-items-center">
            <p class="answer-question"><a href="/answers" class="btn-link">{{ $login_user->answers->count() }}件の質問</a>に答えてもらいました！</p>
        </div>
    </div>
@endsection
