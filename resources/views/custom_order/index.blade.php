@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        @if ($custom_orders->isEmpty())
            <div class="card card-plain">
                <div class="header">
                    <h3 class="title" style="text-align: center">Доступных заказов пока нет...</h3>
                </div>
            </div>
            @else
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Сисок доступных заказов</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Регион</th>
                    <th style="width: 170px;">Дата создания</th>
                    </thead>
                    <tbody>
                    @foreach($custom_orders as $custom_order)
                        <tr onclick="window.location.assign('/custom-order/{{$custom_order->id}}');">
                            <td>{{$custom_order->name}}</td>
                            <td>{{$custom_order->description}}</td>
                            <td>{{$custom_order->category}}</td>
                            <td>{{$custom_order->region}}</td>
                            <td style="width: 170px;">{{$custom_order->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection