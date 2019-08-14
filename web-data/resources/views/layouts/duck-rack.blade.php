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
        @yield('header', View::make('elements.user.header', ['login_user' => $login_user ?? null]))

        <main role="main">
            @yield('content')
        </main>

        @section('footer')
            @include('elements.user.footer')
        @show
    </div>
</div>
</body>
</html>
