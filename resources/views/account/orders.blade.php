@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Мои заказы</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Дата запроса</th>
                    <th scope="col">Наименование/поставщик</th>
                    <th scope="col">Наименование/поставщик</th>
                    <th scope="col">Наименование/поставщик</th>

                </tr>
                </thead>
                <tbody>
              @foreach($orders as $order)
                <tr>
                    <td>$order->id</td>
                    <td>$order->created_at</td>
                    <td>$order->name<br>$order->provider</td>
                    <td>$order->name<br>$order->provider</td>
                    <td>$order->name<br>$order->provider</td>

                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
