@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-left">
                <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group" >
                        <a href="{{route('profile')}}"><button type="button" class="list-group-item list-group-item-action ">Профиль</button></a>
                        <a href="{{route('logo')}}"><button type="button" class="list-group-item list-group-item-action">Логотип</button></a>
                        <a href="{{route('get-edit-email')}}"><button type="button" class="list-group-item list-group-item-action">Изменить Email</button></a>
                        <a href="{{route('get-edit-password')}}"><button type="button" class="list-group-item list-group-item-action">Сменить Пароль</button></a>
                        <a href="{{route('field')}}"><button type="button" class="list-group-item list-group-item-action" >Сфера деятельности</button></a>
                        <a href="{{route('payment')}}"><button type="button" class="list-group-item list-group-item-action">Способ оплаты и доставка</button></a>
                        <a href="{{route('get-description')}}"><button type="button" class="list-group-item list-group-item-action">Описание</button></a>
                        <a href="{{route('requisites')}}"><button type="button" class="list-group-item list-group-item-action">Реквизиты</button></a>
                        <a href="{{route('notifications')}}"><button type="button" class="list-group-item list-group-item-action" >Уведомления</button></a>
                        <a href="{{route('orders')}}"><button type="button" class="list-group-item list-group-item-action">Мои заказы</button></a>
                        <a href="{{route('price')}}"><button type="button" class="list-group-item list-group-item-action" >Загрузить прайс</button></a>
                        <a href="{{route('referal')}}"><button type="button" class="list-group-item list-group-item-action">Реферальная программа</button></a>
                        <a href="{{route('bill')}}"><button type="button" class="list-group-item list-group-item-action">Отправить счет</button></a>
                        <a href="{{route('documents')}}"><button type="button" class="list-group-item list-group-item-action">Загрузка документов для подтверждения успешной сделки</button></a>
                        <a href="{{route('referal-partner')}}"><button type="button" class="list-group-item list-group-item-action" >Реферальная программа (партнерка)</button></a>
                    </div>
                </div>

                @yield('account-content')
            </div>
        <div style="padding: 10px;" class="row justify-content-right">
            <div class="container">
                <a style="padding: 10px; position: absolute; left: 85%; top:40%;" href="{{route('get-order-create')}}" class="btn btn-success btn-lg">Создать заказ</a>
            </div>
            <div class="container">
                <a style="padding: 10px; position: absolute; left: 85%; top:30%;" href="{{route('products.create')}}" class="btn btn-success btn-lg">Добавить товар</a>
            </div>
        </div>
    </div>
@endsection
