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
                        @if($notification->type === "App\Notifications\NewOrder")
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-8">
                                            Для вашей категории поступил новый <a
                                                    href="{{'/custom-order/'.$notification->data['order_id']}}">заказ</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a style="margin-left: 20%;" href="{{route('get-reply-form',
                                            ['id' => $notification->data['id_user_from']])}}" class="btn btn-primary">
                                                Ответить
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif

                        @if($notification->type === "App\Notifications\DoOrder")
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-8">
                                            Ваш товар <a href="/product/{{$notification->data['product_id']}}">
                                                {{$notification->data['product_name']}}
                                            </a> хочет заказать пользователь
                                            <a href="/user/{{$notification->data['id_user_from']}}">
                                                {{$notification->data['name_user_from']}}
                                            </a>
                                            в
                                            размере {{$notification->data['quantity']}} {{$notification->data['measure']}}
                                            @if(isset($notification->data['comment']))
                                                <br>Комментарий:{{$notification->data['comment']}}
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <a style="margin-left: 20%;" href="{{route('get-reply-form',
                                         ['id' => $notification->data['id_user_from']])}}" class="btn btn-primary">
                                                Ответить
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif

                        @if($notification->type === "App\Notifications\ReplyToBuyer")
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-8">
                                            Сообщение от пользователя
                                            <a href="/user/{{$notification->data['id_user_from']}}">
                                                {{$notification->data['name_user_from']}}
                                            </a>
                                            @if(isset($notification->data['comment']))
                                                <br>Сообщение: {{$notification->data['comment']}}
                                            @endif
                                            @if($notification->data['file'])
                                                <a href="{{$notification->data['file']}}">{{$notification->data['file']}}</a>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <a style="margin-left: 20%;" href="{{route('get-reply-form',
                                            ['id' => $notification->data['id_user_from']])}}" class="btn btn-primary">
                                                Ответить
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
