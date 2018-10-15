@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Изменить пароль</h1>
            <form method="post" action="{{action('ProfileController@postEditPassword')}}">
                {{csrf_field()}}
                <div class="input-group">
                    <label for="current_password">Введите ваш текущий пароль
                        <input name="current_password" type="password" class="form-control" placeholder="">
                    </label>
                    </div>
                <div class="input-group">
                    <label for="old_password">Введите новый пароль
                        <input name="new_password" type="password" class="form-control" placeholder="">
                    </label>
                </div>
                    <div class="input-group">
                    <label for="old_password">Подтвердите новый пароль
                        <input name="accept_password" type="password" class="form-control" placeholder="">
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@stop
