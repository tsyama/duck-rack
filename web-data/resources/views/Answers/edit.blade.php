@extends('layouts.duck-rack')

@section('content')
    {{ Form::open(['url' => '/answers/' . $answer->id, 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div>
        <div>
            <img class="duck-icon" src="/img/duck-icon.jpg">
        </div>
        <p class="lead">
            {{ $answer->question->body }}
        </p>
    </div>
    <p>
        <textarea name="body" class="form-control" rows="5">{{ $answer->body }}</textarea>
    </p>
    <div>
        <div>
            <button type="submit" class="btn btn-lg btn-success answer-btn">答える</button>
        </div>
    </div>
    {{ Form::close() }}
@endsection
