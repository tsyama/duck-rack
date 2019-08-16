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
            <p class="lead">自分語りはアヒルにやらせよう</p>
            <h1 class="welcome-title">duck-rack</h1>
            <p>
                <a href="/user/login" class="btn btn-lg btn-info">
                    <i class="fa fa-twitter"></i> ログイン
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
