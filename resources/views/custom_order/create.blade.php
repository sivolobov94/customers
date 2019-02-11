@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
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
                            <form method="post" enctype="multipart/form-data"
                                  action="{{route('post-custom-order-create')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Наименование</label>
                                            <input title="Наименование" value="{{session('name')}}" name="name" type="text"
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
                                                {{session('description')}}
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
                                                @if ($profile->count())
                                                        <option value="{{$profile->region ?? session('region')}}">{{ $profile->region ?? session('region')}}</option>
                                                    @else
                                                        <option value="{{session('region')}}">{{session('region')}}</option>
                                                    @endif
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
                                            @if ($profile->count())
                                                <input value="{{$profile->name ?? session('user_name')}}" name="user_name" type="text"
                                                       class="form-control" placeholder="Введите имя">
                                                @else
                                                <input value="{{session('user_name')}}" name="user_name" type="text"
                                                       class="form-control" placeholder="Введите имя">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Email</label>
                                            @if ($profile->count())
                                            <input value="{{$profile->email ?? session('email')}}" name="email"
                                                   type="text" class="form-control" placeholder="example@mail.ru">
                                                @else
                                                <input value="{{session('email')}}" name="email"
                                                       type="text" class="form-control" placeholder="example@mail.ru">
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="phone">Телефон</label>
                                            @if ($profile->count())
                                            <input id="phone" value="{{$profile->phone ?? session('phone')}}" name="phone"
                                                   type="text" class="form-control" placeholder="89998887766">
                                                @else
                                                <input id="phone" value="{{session('phone')}}" name="phone"
                                                       type="text" class="form-control" placeholder="89998887766">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Группы товаров/услуг</label>
                                            <select name="category" id="inputState"
                                                    class="form-control form-control-lg">
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
