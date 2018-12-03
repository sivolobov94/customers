@extends('layouts.account')

@section('account-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Оплата заказа успешно подтерждена!</h4>
                <a href="{{route('orders-sale')}}">Назад</a>
            </div>
        </div>
    </div>
@endsection