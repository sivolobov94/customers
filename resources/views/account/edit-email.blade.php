@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Изменить Email</h1>
            <p class="lead">email: </p>
            <p class="lead">Введите новый email</p>
            <form method="post" action="{{action('AccountController@postEditEmail')}}">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="example@mail.com">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@stop
