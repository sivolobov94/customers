@extends('layouts.app')

        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>
<style>
    html, body {
        background-image: url("../../img/uspeh_bg.png");
        background-size: cover;
        overflow: hidden;
    }

    .text {
        position	: absolute;
        top		    : 350px;
        left		: 450px;
        width		: 100%;

        color			: white;
        font			: bold 44px Helvetica, Sans-Serif;
        font-size: 40px;
        font-style: normal;
        font-family: "Helvetica Neue", sans-serif;
        letter-spacing		: -1px;
        padding			: 10px;
    }
    .green {
        color: green;
    }

</style>
@section('content')
<body>
    <div class="text">
        <h3>Возвращайте деньги...</h3>
        <h2><span class="green">экономьте</span> на покупках...</h2>
        <h1>зарабатывайте еще!</h1>
    </div>

</body>
</html>
@endsection

