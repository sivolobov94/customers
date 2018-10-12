@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Профиль</h1>
            @empty($profile)
                <p>ваш профиль еще не заполнен.</p>
                <a class="btn btn-primary" href="{{route('get-edit-profile')}}">
                    Заполнить
                </a>
                @endempty
            @foreach($profile as $item)
            <p class="lead">имя: {{$item->name}}</p>
            <p class="lead">Компания или Частное лицо: {{$item->company}}</p>
            <p class="lead">Телефон: {{$item->phone}}</p>
            <p class="lead">Регион: {{$item->region}}</p>
            <p class="lead">Фактический адрес: {{$item->address}}</p>
            @endforeach
            <a class="btn btn-primary" href="{{route('get-edit-profile')}}">
                Изменить
            </a>
        </div>
    </div>
@stop
