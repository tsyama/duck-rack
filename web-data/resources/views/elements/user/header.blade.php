<header class="mb-auto sticky-top @if(request()->is('/')) header-home @endif">
    <h3 class="logo"><a href="/">duck-rack</a></h3>
    @if(isset($login_user))
        <img class="twitter-icon" src="{{ $login_user->avatar }}" alt="{{ $login_user->name }}">
        <nav class="nav menu">
            <a class="nav-link duck-nav-menu @if(request()->is('answers/create*')) active @endif" href="/answers/create">答える</a>
            <a class="nav-link duck-nav-menu @if(request()->is('answers')) active @endif " href="/answers">見る</a>
            <a class="nav-link duck-nav-menu @if(request()->is('users/config')) active @endif" href="/users/config">設定</a>
        </nav>
    @else
        <nav class="nav menu">
            <a class="nav-link duck-nav-menu" href="/user/login">ログイン</a>
        </nav>
    @endif
</header>
