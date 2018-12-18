@extends('layouts.app')

@section('content')
    <div class="container" style="border: 4px solid darkslategray">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Название: {{$order->name}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="description">
                            Описание: {{$order->description}}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input title="Производитель" type="text" readonly class="form-control-plaintext"
                               value="Регион: {{$order->region}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" readonly class="form-control-plaintext"
                               value="Имя Заказчика: {{$order->user_name}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" readonly class="form-control-plaintext" value="Email: {{$order->email}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" readonly class="form-control-plaintext" value="Телефон: {{$order->phone}}">
                    </div>
                </div>
                @if($order->file)
                    <div class="row">
                        <div class="col-md-12">
                            <span>Приложенный файл:</span>
                            <a href="{{asset('/custom_orders_files/'.$order->file)}}">{{$order->file}}</a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->toArray()['role'] == 'sale')
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{route('get-accept-delivery', ['id' => $order->user_id])}}">Откликнуться</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection