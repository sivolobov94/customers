@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Редактирование профиля</h1>
            <p class="lead">имя: <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
            <p class="lead">Компания или Частное лицо: <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
            <p class="lead">Телефон: <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
            <p class="lead">Регион: <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
            <p class="lead">Фактический адрес: <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
            <button type="button" class="btn btn-primary">Изменить</button>
        </div>
    </div>
@stop
