@extends('layouts.duck-rack')

@section('content')
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
                <div class="card answer-card @if($answer->tweet_enabled_flag) active @endif">
                    <div class="row">
                        <div class="col-12">
                            <p>{!! nl2br(htmlspecialchars($answer->body)) !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            {{ Form::open(['url' => '/answers/' . $answer->id . '/config', 'method' => 'POST']) }}
                                @if($answer->tweet_enabled_flag)
                                    <input type="hidden" name="tweet_enabled_flag" value="0">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block">ツイートしない</button>
                                @else
                                    <input type="hidden" name="tweet_enabled_flag" value="1">
                                    <button type="submit" class="btn btn-sm btn-outline-primary btn-block">ツイート許可</button>
                                @endif
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <img class="duck-icon answer-icon img-fluid mx-auto" src="{{ $login_user->avatar }}">
            </div>
        </div>
    @endforeach
@endsection
