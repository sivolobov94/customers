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
                    <th>Покупатель</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Кэшбэк</th>
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
                                <td>
                                    <form method="post" action="{{route('send-pay-accept')}}">
                                        <input title="order_id" name="order_id" value="{{$order->id}}" type="text"
                                               hidden>
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-primary">Согласовать</button>
                                    </form>
                                </td>
                            @elseif ($order->status == \App\Order::STATUS_WAITING)
                                <td>
                                    <a class="btn btn-primary disabled" >На согласовании</a>
                                </td>
                                @elseif($order->status == \App\Order::STATUS_AGREE)
                                <td>
                                    <a class="btn btn-primary disabled" >Согласован</a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
