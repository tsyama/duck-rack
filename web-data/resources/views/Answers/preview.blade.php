@extends('layouts.duck-rack')

@section('content')
    <div class="row answer-row">
        <div class="col-2 d-flex align-items-center">
            <img class="duck-icon answer-icon img-fluid mx-auto" src="/img/duck-icon.jpg">
        </div>
        <div class="col-9 d-flex align-items-center">
            <p class="answer-question">{{ $answer->question->body }}</p>
        </div>
    </div>
    <div class="row answer-row">
        <div class="col-9 offset-1">
            <div class="card answer-card @if($answer->canTweet()) active @endif">
                <p>{!! nl2br(htmlspecialchars($answer->body)) !!}</p>
            </div>
        </div>
        <div class="col-2">
            <img class="duck-icon answer-icon img-fluid mx-auto" src="{{ $answer->user->avatar }}">
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
