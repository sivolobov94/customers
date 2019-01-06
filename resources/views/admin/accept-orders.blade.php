@extends('layouts.admin')

@section('admin-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Утверждение заказов</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Номер заказа</th>
                    <th>Продукт</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Продавец</th>
                    <th>Сумма</th>
                    <th>кэшбэк</th>
                    <th>реф.вознаграждение</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr >
                            <td>{{$order->id}}</td>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->product_price}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td>{{$order->sale}}</td>
                            <td>{{$order->sum}}</td>
                            <td>{{$order->cashback}}</td>
                            <td>{{$order->referal_reward}}</td>
                            <td>
                                <form method="post" action="{{route('pay-accept')}}">
                                    <input title="order_id" name="order_id" value="{{$order->id}}" type="text"
                                           hidden>
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary">Согласовать</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
