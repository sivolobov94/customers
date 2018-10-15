@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Редактирование профиля</h1>
            <form method="post" action="{{action('ProfileController@postEditProfile')}}">
                {{csrf_field()}}
                @if($profile === null)
                    <p class="lead">имя: <input name="name" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <p class="lead">Компания или Частное лицо: <input name="company" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <p class="lead">Телефон: <input name="phone" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <p class="lead">Регион: <input name="region" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <p class="lead">Фактический адрес: <input name="address" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                @else
                @foreach($profile as $item)
                <p class="lead">имя: <input name="name" value="{{$item->name}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Компания или Частное лицо: <input name="company" value="{{$item->company}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Телефон: <input name="phone" value="{{$item->phone}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Регион: <input name="region" value="{{$item->region}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Фактический адрес: <input name="address" value="{{$item->address}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                @endforeach
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    @endif
            </form>
        </div>
    </div>
@stop
