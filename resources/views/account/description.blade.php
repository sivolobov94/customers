@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Описание</h1>
                <div class="form-group">
                    <label for="small_description">Краткое описание: </label>
                    <p>{{$profile->small_description}}</p>
                </div>
                <div class="form-group">
                    <label for="description">Детальное описание</label>
                    <p>{{$profile->description}}</p>

                    <div class="form-group">
                        <label for="site">Сайт</label>
                        <p>{{$profile->site}}</p>
                    </div>
                </div>
                <a href="{{route('get-edit-description')}}" class="btn btn-primary">Изменить</a>
        </div>
    </div>
@stop
