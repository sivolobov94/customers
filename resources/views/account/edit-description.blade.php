@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Описание</h1>
            <form method="post" action="{{action('ProfileController@postEditDescription')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="small_description">Краткое описание</label>
                    <textarea name="small_description" class="form-control rounded-0" rows="3">{{$profile->small_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Детальное описание</label>
                    <textarea name="description" class="form-control rounded-0" rows="10">{{$profile->description}}</textarea>
                    <div class="form-group">
                        <label for="site">Сайт</label>
                        <input value="{{$profile->site}}" name="site" type="text" class="form-control rounded-0">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@stop
