@extends('layouts.duck-rack-admin')

@section('title')
    質問編集
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Question</h3>
                </div>
                <form role="form" action="/admin/questions/{{ $question->id }}" method="post">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputBody">質問文</label>
                            {{ Form::textarea('body', $question->body, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-right">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
