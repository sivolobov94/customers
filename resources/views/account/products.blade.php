@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Мои товары</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">категория</th>
                    <th scope="col">Регион</th>
                    <th scope="col">Изготовитель</th>
                    <th scope="col">категория</th>
                    <th scope="col">единицы измерения</th>
                    <th scope="col">цена за штуку</th>
                    <th scope="col">кэшбэк</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->region}}</td>
                    <td>{{$product->manufacturer}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->measure}}</td>
                    <td>{{$product->price_for_one}}</td>
                    <td>{{$product->cashback}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
