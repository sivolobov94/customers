<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Сервис кэшбэка</title>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/my.css') }}" rel="stylesheet">
	<link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
    <link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Главная</a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('get-custom-order-create')}}">Создать заказ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('get-all-custom-order')}}">Все заказы<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('get-all-products')}}">Все товары<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('about')}}">О площадке <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('how-it-works')}}">Как это работает</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('feedback')}}">Обратная связь</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" METHOD="get" action="{{route('search')}}">
                    @csrf
                    <input name="text" class="form-control mr-sm-2" type="text" placeholder="Введите название"
                           aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ 'Пользователь' }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Личный кабинет</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-1">
        @yield('content')
    </main>
</div>
</body>
    <!-- Scripts -->
<script src="{{ asset('js/jquery-1.10.2.min.js')}}"></script>
<script src="{{ asset('js/shieldui-all.min.js') }}" defer></script>
<script src="{{asset('js/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
<script>
    jQuery(function($){
        $("#phone").mask("8(999)999-99-99");
    });
</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'v08jWYp0ze';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->

<script type="text/javascript">
    $(function () {
        $("#treeview").shieldTreeView({
            checkboxes: {
                enabled: true,
                children: true
            },
            dragDrop: true
        });
    });
</script>

<script type="text/javascript">
    /*jQuery(function ($) {
        $("#treeview").shieldTreeView();
    });*/

</script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/light-bootstrap-dashboard.js') }}" defer></script>
</html>
