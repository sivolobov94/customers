@extends('layouts.app')

@section('content')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="{{asset('img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet"/>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="{{asset('img/sidebar-5.jpg')}}">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="{{route('profile')}}">
                        <i class="pe-7s-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('get-edit-profile')}}">
                        <i class="pe-7s-user"></i>
                        <p>Настройки</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('get-edit-password')}}">
                        <i class="pe-7s-user"></i>
                        <p>Изменить пароль</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('orders')}}">
                        <i class="pe-7s-user"></i>
                        <p>Мои заказы</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('notifications')}}">
                        <i class="pe-7s-user"></i>
                        <p>Уведомления</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('referal')}}">
                        <i class="pe-7s-user"></i>
                        <p>Партнерская программа</p>
                    </a>
                </li>
                    <li>
                        <a href="{{route('balance')}}">
                            <i class="pe-7s-user"></i>
                            <p>Баланс</p>
                        </a>
                    </li>
            </ul>
        </div>
    </div>

    <div class="main-panel" style="margin-top: 60px;">
        @yield('account-content')
    </div>
</div>
</body>

<script src="{{asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
<script>
    jQuery(function($){
        $("#phone").mask("8(999)999-99-99");
        $("#r_phone").mask("8(999)999-99-99");
        $("#date").mask("99.99.9999");
        $("#fax").mask("8-999-9999999");
        $("#inn").mask("9999999999-99");
        $("#kpp").mask("999-999-999");
        $("#ogrn").mask("9-99-99-99-99999-9");
        $("#okpo").mask("9999999999");
        $("#cashback").mask("99");


    });
</script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('js/light-bootstrap-dashboard.js')}}"></script>
</html>
@endsection
