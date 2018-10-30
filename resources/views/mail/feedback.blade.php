@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Сообщение от {{$name}}</h1>
        <p>

        </p>
        <a href="{{'/'}}" class="btn btn-primary">вернуться на главную</a>
    </div>
</div>
@stop
