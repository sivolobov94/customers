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
                            @if(!$order->accepted)
                                <td>
                                    <form method="post" action="{{route('pay-accept')}}">
                                        <input title="order_id" name="order_id" value="{{$order->id}}" type="text"
                                               hidden>
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-primary">Подтвердить оплату.</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a class="btn btn-primary disabled" >Оплата подтверждена.</a>
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
