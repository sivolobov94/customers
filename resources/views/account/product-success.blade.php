@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Продукт успешно добавлен.</h1>
            <a href="{{route('profile')}}" class="btn btn-primary">Профиль</a>
            <a href="{{route('get-product-create')}}" class="btn btn-primary">Добавить еще</a>
        </div>
    </div>
@stop
