@extends('layouts.account-buyer')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card order-create">
                        <div class="header">
                            <h4 class="title">Создание заказа</h4>
                        </div>
                        <div class="content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" enctype="multipart/form-data" action="{{route('post-custom-order-create')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Наименование</label>
                                            <input title="Наименование" value="" name="name" type="text"
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
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Регион</label>
                                            <select name="region" id="inputState" class="form-control form-control-lg">
                                                @if($regions)
                                                    <option value="{{$profile->region}}">{{ $profile->region}}</option>
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
                                            <input value="{{$profile->name ?? ''}}" name="user_name" type="text"
                                                   class="form-control" placeholder="Введите имя">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Email</label>
                                            <input value="{{$profile->r_email ?? ''}}" name="email"
                                                   type="text" class="form-control" placeholder="example@mail.ru">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="phone">Телефон</label>
                                            <input id="phone" value="{{$profile->phone ?? ''}}" name="phone"
                                                   type="text" class="form-control" placeholder="89998887766">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Группы товаров</label>
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
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
