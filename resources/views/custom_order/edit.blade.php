@extends('layouts.account')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card order-create">
                        <div class="header">
                            <h4 class="title">Редактирование заказа</h4>
                        </div>
                        <div class="content">
                            <form method="post" enctype="multipart/form-data" action="{{route('post-custom-order-edit')}}">
                                {{csrf_field()}}
                                <input title="custom_order_id" name="custom_order_id" value="{{$custom_order->id}}" type="text" hidden>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Наименование</label>
                                            <input title="Наименование" value="{{$custom_order->name ?? ''}}" name="name" type="text"
                                                   class="form-control" placeholder="Заголовок вашего заказа...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="inputState">Описание</label>
                                        <div class="form-group">
                                            <textarea title="Описание" name="description" id="" cols="60" rows="5"
                                                      placeholder="Опишите подробнее, что вы хотели бы найти...">
                                                {{$custom_order->description ?? ''}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Регион</label>
                                            <select  name="region" id="inputState" class="form-control form-control-lg">
                                                @if($regions)
                                                    @foreach($regions as $region)
                                                        <option>{{ $region->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Ваше имя</label>
                                            <input value="{{$custom_order->user_name ?? ''}}" name="user_name" type="text"
                                                   class="form-control" placeholder="Введите имя">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Email</label>
                                            <input value="{{$custom_order->email ?? ''}}" name="email"
                                                   type="text" class="form-control" placeholder="example@mail.ru">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Телефон</label>
                                            <input value="{{$custom_order->phone ?? ''}}" name="phone"
                                                   type="text" class="form-control" placeholder="+79998887766">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Категория</label>
                                            <select name="category" id="inputState" class="form-control form-control-lg">
                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <option>{{ $category->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleFormControlFile1">Приложить файл</label>
                                        <input name="file" type="file" class="form-control-file"
                                               id="exampleFormControlFile1">
                                        <a href="{{asset('/custom_orders_files/'.$custom_order->file)}}">{{$custom_order->file}}</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
