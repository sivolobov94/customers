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
                    <p class="lead">Телефон: <input name="phone" value="" type="tel" class="form-control" placeholder="+79998887766" aria-label="Username" aria-describedby="basic-addon1" pattern="\+7[0-9]{10}"></p>
                    <p class="lead">Регион: <input name="region" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <p class="lead">Фактический адрес: <input name="address" value="" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                @else
                <p class="lead">имя: <input name="name" value="{{$profile->name}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Компания или Частное лицо: <input name="company" value="{{$profile->company}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Телефон: <input name="phone" value="{{$profile->phone}}" type="tel" class="form-control" placeholder="+79998887766" aria-label="Username" aria-describedby="basic-addon1"  pattern='\+7[0-9]{10}'></p>
                <p class="lead">Регион: <input name="region" value="{{$profile->region}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                <p class="lead">Фактический адрес: <input name="address" value="{{$profile->address}}" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1"></p>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                @endif
            </form>
        </div>
    </div>
@stop
