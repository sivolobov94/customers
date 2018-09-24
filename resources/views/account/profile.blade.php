@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Профиль</h1>
            <p class="lead">имя: Владимир</p>
            <p class="lead">Компания или Частное лицо: ООО "МТС"</p>
            <p class="lead">Телефон: +7 999 999 99 99</p>
            <p class="lead">Регион: Москва</p>
            <p class="lead">Фактический адрес: г.Москва, Ул.Ленина 25</p>
            <a href="{{route('edit-profile')}}">
                <button type="button" class="btn btn-primary">Изменить</button>
            </a>
        </div>
    </div>
@stop
