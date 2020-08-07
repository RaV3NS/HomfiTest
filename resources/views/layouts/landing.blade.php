<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homfi Test</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Homfi Test</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Главная</a>
                    </li>

                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Админ-панель</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Выход</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Регистрация</a>
                        </li>
                    @endif

                </ul>
                <form class="d-flex" action="/search" method="get">
                    <input class="form-control mr-2" type="search" placeholder="Поиск" name="word" aria-label="Search" value="{{ Request::get('word') ?? '' }}">
                    <button class="btn btn-outline-light" type="submit">Найти</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
