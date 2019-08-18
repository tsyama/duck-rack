@extends('layouts.duck-rack')

@section('content')
    <div class="row answer-row">
        <div class="col-11 d-flex align-items-center">
            <img class="duck-icon answer-icon" src="/img/duck-icon.jpg">
            <p class="answer-question">{{ $answer->question->body }}</p>
        </div>
    </div>
    <div class="row answer-row">
        <div class="col-11 offset-1">
            <img class="duck-icon answer-icon pull-right" src="{{ $answer->user->avatar }}">
            <div class="card answer-card @if($answer->isConfiguredTweetEnabled()) active @endif">
                <p>{!! nl2br(htmlspecialchars($answer->body)) !!}</p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px">
        <div class="col-12">
            <p class="lead mx-auto">
                <a target="_blank" href="https://twitter.com/search?q={{ urlencode('from:' . $answer->user->nickname . ' #duck_rack') }}"> >> {{ $answer->user->name }}さんのつぶやきを見る</a>
            </p>
        </div>
    </div>
@endsection
