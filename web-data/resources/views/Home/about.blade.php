<!doctype html>
<html lang="ja" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>duck-rack</title>

    <link href="/css/app.css" rel="stylesheet">

</head>
<body class="text-center full-height">
<div class="bg bg-top">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        @yield('header', View::make('elements.user.header', ['login_user' => $login_user ?? null]))

        <main role="main">
            <h1 class="welcome-title">duck-rackとは</h1>
            <br>
            <br>
            <p class="lead">・アヒルがあなたの自分語りを代行します</p>
            <p class="lead">・あなたはアヒルの質問に答えるだけです</p>
            <p class="lead">・毎日一回、あなたのアカウントでアヒルがツイートします</p>
            <p>
                <a href="https://twitter.com/DuckRack" target="_blank" class="btn btn-lg btn-success">
                    サンプルを見る
                </a>
            </p>
        </main>

        <footer class="mt-auto">
            <p>&copy; 2019 <a href="https://twitter.com/tsyama_desu" target="_blank">@tsyama_desu</a></p>
        </footer>
    </div>
</div>
</body>
</html>
