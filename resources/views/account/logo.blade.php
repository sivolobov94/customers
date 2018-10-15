@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Логотип</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <button type="submit">Загрузить</button>
            </form>
            <button type="button" class="btn btn-primary">Изменить</button>
        </div>
    </div>
@stop
