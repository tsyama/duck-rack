@extends('layouts.duck-rack')

@section('content')
    <div class="row answer-row">
        <div class="col-2 d-flex align-items-center">
            <img class="duck-icon answer-icon img-fluid mx-auto" src="/img/duck-icon.jpg">
        </div>
        <div class="col-9 d-flex align-items-center">
            <p class="answer-question">回答を自動的にツイートしますか？</p>
        </div>
    </div>
    <div class="row answer-row">
        <div class="col-9 offset-1">
            <div class="card answer-card active">
                <div class="row" style="padding: 10px">
                    <div class="col-6">
                        @if($login_user->tweet_enabled_flag)
                            <button type="button" class="btn btn-danger btn-block">YES</button>
                        @else
                            {{ Form::open(['url' => '/users/config', 'method' => 'POST']) }}
                                <input type="hidden" name="tweet_enabled_flag" value="1">
                                <button type="submit" class="btn btn-outline-danger btn-block">YES</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                    <div class="col-6">
                        @if(!$login_user->tweet_enabled_flag)
                            <button type="button" class="btn btn-primary btn-block">NO</button>
                        @else
                            {{ Form::open(['url' => '/users/config', 'method' => 'POST']) }}
                                <input type="hidden" name="tweet_enabled_flag" value="0">
                                <button type="submit" class="btn btn-outline-primary btn-block">NO</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <img class="duck-icon answer-icon img-fluid mx-auto" src="{{ $login_user->avatar }}">
        </div>
    </div>
@endsection
