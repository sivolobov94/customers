@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Профиль</h1>
            @if($profile === null)
                <p>ваш профиль еще не заполнен.</p>
                <a class="btn btn-primary" href="{{route('get-edit-profile')}}">
                    Заполнить
                </a>
            @else
                <p class="lead">имя: {{$profile->name}}</p>
                <p class="lead">Компания или Частное лицо: {{$profile->company}}</p>
                <p class="lead">Телефон: {{$profile->phone}}</p>
                <p class="lead">Регион: {{$profile->region}}</p>
                <p class="lead">Фактический адрес: {{$profile->address}}</p>
                <a class="btn btn-primary" href="{{route('get-edit-profile')}}">
                    Изменить
                </a>
            @endif
        </div>
    </div>
@stop
