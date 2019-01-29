@extends('layouts.account')

@section('account-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Ваши товары</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Регион</th>
                    <th>Производитель</th>
                    <th>Единица измерения</th>
                    <th>Цена за единицу</th>
                    <th>% кэшбэка</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                            <tr onclick="window.location.assign('/product/{{$product->id}}');">
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->region}}</td>
                                <td>{{$product->manufacturer}}</td>
                                <td>{{$product->measure}}</td>
                                <td>{{$product->price_for_one}}</td>
                                <td>{{$product->cashback}}</td>
                                <td><a class="btn btn-primary" href="{{route('get-product-edit', ['id' => $product->id])}}">Изменить</a></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                <div class="container">
                    <a  href="{{route('get-product-create')}}"
                       class="btn btn-outline-secondary btn-lg">Добавить товар</a>
                </div>
@stop
