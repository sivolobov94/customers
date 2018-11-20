@extends('layouts.account')

@section('account-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Уведомления</h4>
                <p class="category">здесь будет отображаться информация о новых откликах</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <tbody>
                    @foreach($notifications as $notification)
                    <tr>
                        <td>Ваш товар <a href="/product/{{$notification->data['product_id']}}">{{$notification->data['product_name']}}</a>
                            хочет заказать пользователь <a href="/user/{{$notification->data['id_user_from']}}">
                                {{$notification->data['name_user_from']}}</a> в размере {{$notification->data['quantity']}} {{$notification->data['measure']}}
                            <a style="margin-left: 20%;" href="#" class="btn btn-primary">Утвердить поставку</a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
