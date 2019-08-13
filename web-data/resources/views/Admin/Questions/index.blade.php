@extends('layouts.duck-rack-admin')

@section('title')
    質問一覧
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Questions</h3>
                    <div class="card-tools">
                        <a href="/admin/questions/create" class="btn btn-outline-success">新規作成</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>body</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->body }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/admin/questions/{{ $question->id }}/edit" class="btn btn-block btn-outline-info">編集</a>
                                        </div>
                                        <div class="col-6">
                                            <form action="/admin/questions/{{ $question->id }}" method="post">
                                                @method('delete')
                                                {{ csrf_field() }}
                                                <input class="btn btn-outline-danger btn-block" type="submit" value="削除">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
