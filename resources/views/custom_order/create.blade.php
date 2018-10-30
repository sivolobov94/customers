@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3>Создание заказа</h3>
            <form method="post" action="{{route('post-custom-order-create')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Наименование
                        <input value="" name="name" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="description">Описание
                        <input value="" name="description" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="region">Регион
                        <input value="" name="region" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="user_name">Ваше имя
                        <input value="" name="user_name" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="email">email
                        <input value="" name="email" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон
                        <input value="" name="phone" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <div class="form-group">
                    <label for="category">Рубрика
                        <input value="" name="category" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Создать заказ</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
