@extends('layouts.duck-rack')

@section('content')
    @if(!$login_user->canTweet())
        <div class="row answer-row">
            <div class="col-2 d-flex align-items-center">
                <img class="duck-icon answer-icon img-fluid mx-auto" src="/img/duck-icon.jpg">
            </div>
            <div class="col-9 d-flex align-items-center">
                <p class="answer-question font-weight-bold">ツイートが許可されていません！<br>ツイートを許可するには「設定」から変更してください</p>
            </div>
        </div>
    @endif
    @foreach($login_user->answers as $answer)
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
                    <div class="row">
                        <div class="col-12">
                            <p>{!! nl2br(htmlspecialchars($answer->body)) !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            @if($answer->user->canTweet())
                                {{ Form::open(['url' => '/answers/' . $answer->id . '/config', 'method' => 'POST']) }}
                                    @if($answer->canTweet())
                                        <input type="hidden" name="tweet_enabled_flag" value="0">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block">ツイートしない</button>
                                    @else
                                        <input type="hidden" name="tweet_enabled_flag" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-primary btn-block">ツイート許可</button>
                                    @endif
                                {{ Form::close() }}
                            @endif
                        </div>
                        <div class="col-3">
                            <a href="/answers/{{ $answer->id }}/edit" class="btn btn-warning btn-sm btn-block"><i class="fa fa-edit"></i></a>
                        </div>
                        <div class="col-3">
                            {{ Form::open(['url' => '/answers/' . $answer->id, 'method' => 'DELETE']) }}
                            <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="if (!confirm('回答を削除しますか？')) return false;"><i class="fa fa-remove"></i></button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                @if($answer->last_tweeted_at)
                    <div class="row">
                        <div class="col-12">
                            <p class=" pull-right">
                                最終ツイート：{{ $answer->last_tweeted_at }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-2">
                <img class="duck-icon answer-icon img-fluid mx-auto" src="{{ $login_user->avatar }}">
            </div>
        </div>
    @endforeach
@endsection
