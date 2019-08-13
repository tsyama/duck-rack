<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>duck-rack</title>

    <link href="/css/app.css" rel="stylesheet">

</head>
<body class="text-center">
<div class="bg">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <h3 class="logo"><a href="/">duck-rack</a></h3>
            <img class="twitter-icon" src="{{ $login_user->avatar }}">
            <nav class="nav menu">
                <a class="nav-link duck-nav-menu active" href="#">答える</a>
                <a class="nav-link duck-nav-menu" href="#">見る</a>
                <a class="nav-link duck-nav-menu" href="#">設定</a>
            </nav>
        </header>

        <main role="main">
            <div>
                <div>
                    <img class="duck-icon" src="/img/duck-icon.jpg">
                </div>
                <p class="lead">
                    あなたの大好きなことはなんですか？
                </p>
            </div>
            <p>
                <textarea class="form-control" rows="5"></textarea>
            </p>
            <div class="">
                <div>
                    <a href="/user/login" class="btn btn-lg btn-danger pull-left answer-btn">
                        わからない
                    </a>
                    <a href="/user/login" class="btn btn-lg btn-success pull-right answer-btn">
                        答える
                    </a>
                </div>
            </div>
        </main>

        <footer class="mt-auto">
            <p>&copy; 2019 <a href="https://twitter.com/tsyama_desu" target="_blank">@tsyama_desu</a></p>
        </footer>
    </div>
</div>
</body>
</html>
