@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Изменить Email</h1>
            <form class="form-group" method="post" action="{{route('edit-email')}}">
                {{csrf_field()}}
                <label for="current_email">Ваш текущий email</label>
                <input id="current_email" class="form-control" name="email" type="email" value="">
                <label for="new_email1">Введите новый email</label>
                <input id="new_email1" class="form-control" name="email" type="email" value="">
                <label for="new_email2">Подтвердите email</label>
                <input id="new_email2" class="form-control" name="email" type="email" value="">
            </form>
            <button type="button" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
@stop
