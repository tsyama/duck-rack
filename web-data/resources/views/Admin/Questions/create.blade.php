@extends('layouts.duck-rack-admin')

@section('title')
    新規質問作成
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New Question</h3>
                </div>
                <form role="form" action="/admin/questions" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputBody">質問文</label>
                            <textarea name="body" class="form-control" id="InputBody"></textarea>
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
