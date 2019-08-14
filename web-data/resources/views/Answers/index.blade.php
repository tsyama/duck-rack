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
                <textarea class="form-control">{{ $answer->body }}</textarea>
            </div>
            <div class="col-2">
                <img class="duck-icon answer-icon img-fluid mx-auto" src="{{ $login_user->avatar }}">
            </div>
        </div>
    @endforeach
@endsection
