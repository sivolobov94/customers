@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card order-create">
                        <div class="header">
                            <h4 class="title">Создание заказа</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="{{route('post-custom-order-create')}}">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Наименование</label>
                                            <input value="" name="name" type="text"
                                                   class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Описание</label>
                                            <input value="" name="description"
                                                   type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Регион</label>
                                            <select name="category" id="inputState" class="form-control form-control-lg">
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
                                            <input value="" name="user_name" type="text"
                                                   class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Email</label>
                                            <input value="" name="email"
                                                   type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Телефон</label>
                                            <input value="" name="phone"
                                                   type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputState">Рубрики</label>
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
                                        <label for="exampleFormControlFile1">Изображение (необязательно)</label>
                                        <input name="image" type="file" class="form-control-file"
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
