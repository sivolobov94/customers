@extends('layouts.account')

@section('account-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Ваши заказы</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Регион</th>
                    <th>Имя покупателя</th>
                    <th>Электронная почта</th>
                    <th>телефон</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr onclick="window.location.assign('/custom-order/{{$order->id}}');">
                            <td>{{$order->name}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->category}}</td>
                            <td>{{$order->region}}</td>
                            <td>{{$order->user_name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td><a class="btn btn-primary" href="{{route('get-custom-order-edit', ['id' => $order->id])}}">Изменить</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
