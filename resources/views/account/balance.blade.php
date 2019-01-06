@extends('layouts.account')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="header">
                <h4 class="title">Ваши покупки</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Продавец</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Кэшбэк</th>
                    <th>Статус</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->product_price}}</td>
                            <td>{{$order->sale}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td>{{$order->sum}}</td>
                            <td>{{$order->cashback}}</td>
                            @if($order->status == \App\Order::STATUS_DISAGREE)
                                <td>Не подтвержден</td>
                            @elseif($order->status == \App\Order::STATUS_WAITING)
                                <td>На утверждении</td>
                            @elseif($order->status == \App\Order::STATUS_AGREE)
                                <td>Подтвержден</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Неподтвержденный баланс {{$profile->balance ?? 0}} руб.</h4>
                            <h4 class="title">Подтвержденный баланс {{$profile->accepted_balance ?? 0}} руб.</h4>
                        </div>
                        <a href="{{route('get-cashback-form')}}" class="btn btn-primary">Заказать вывод средств</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
