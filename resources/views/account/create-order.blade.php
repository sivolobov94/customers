@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Описание</h1>
            <form method="post" action="{{route('post-order-create')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Наименование
                        <input value="" name="name" type="text" class="form-control rounded-0">
                    </label>
                    <label for="description">Описание
                        <input value="" name="description" type="text" class="form-control rounded-0">
                    </label>
                    <label for="category">Категория
                        <input value="" name="category" type="text" class="form-control rounded-0">
                    </label>
                    <label for="region">Регион
                        <input value="" name="region" type="text" class="form-control rounded-0">
                    </label>
                    <label for="manufacturer">Производитель
                        <input value="" name="manufacturer" type="text" class="form-control rounded-0">
                    </label>
                    <label for="image">Фото
                        <input value="" name="image" type="text" class="form-control rounded-0">
                    </label>
                    <label for="measure">Единица измерения
                        <input value="" name="measure" type="text" class="form-control rounded-0">
                    </label>
                    <label for="price_for_one">Цена за штуку
                        <input value="" name="price_for_one" type="text" class="form-control rounded-0">
                    </label>
                    <label for="cashback">% Кэшбэка
                        <input value="" name="cashback" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@stop
