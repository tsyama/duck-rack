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
<div class="bg-scroll">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto sticky-top">
            <h3 class="logo"><a href="/">duck-rack</a></h3>
            @if(isset($login_user))
                <img class="twitter-icon" src="{{ $login_user->avatar }}" alt="{{ $login_user->name }}">
            @endif
            <nav class="nav menu">
                <a class="nav-link duck-nav-menu @if(request()->is('answers/create*')) active @endif" href="/answers/create">答える</a>
                <a class="nav-link duck-nav-menu @if(request()->is('answers')) active @endif " href="/answers">見る</a>
                <a class="nav-link duck-nav-menu" href="#">設定</a>
            </nav>
        </header>

        <main role="main">
            @yield('content')
        </main>

        <footer class="mt-auto">
            <p>&copy; 2019 <a href="https://twitter.com/tsyama_desu" target="_blank">@tsyama_desu</a></p>
        </footer>
    </div>
</div>
</body>
</html>
