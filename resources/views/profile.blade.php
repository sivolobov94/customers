@extends('layouts.app')

@section('content')

    @if($profile === null)
        <div class="col-md-12">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ваш профиль еще не заполнен.</h4>
                            </div>
                            <div class="content">
                                <a class="btn btn-primary" href="{{route('get-edit-profile')}}">Заполнить</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else
                <div class="col-md-12">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                 alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                @if($profile->logo)
                                    <img class="avatar border-gray" src="../../../{{$profile->logo}}" alt="logo"/>
                                @else
                                    <img class="avatar border-gray" src="../../../img/no-photo.png" alt="no-photo"/>
                                @endif
                                <h4 class="title">{{$profile->name}}<br/>
                                    <small>Компания {{$profile->company}}</small>
                                </h4>
                            </div>
                            <p class="description text-center"> {{$profile->region}}<br>
                                {{$profile->address}} <br>
                                {{$profile->phone}}
                            </p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Информация</h4>
                                        </div>
                                        <div class="content">
                                            <form method="POST" action="{{route('post-edit-profile')}}">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Краткое описание</label>
                                                            <textarea name="small_description" type="text"
                                                                      class="form-control-plaintext" placeholder="">
                                                                {{$profile->small_description}}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Детальное описание</label>
                                                            <textarea name="description" rows="5"
                                                                      class="form-control-plaintext"
                                                                      placeholder="">
                                                                {{$profile->description}}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Сайт</label>
                                                            <input value="{{$profile->site}}" readonly name="site"
                                                                   type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="inputState">Категории</label>
                                                            <input value="{{$profile->category}}" readonly name="site"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h3>Реквизиты</h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Полное наименование предприятия</label>
                                                            <input value="{{$profile->r_fullname}}" readonly
                                                                   name="r_fullname"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Сокращенное название предприятия</label>
                                                            <input value="{{$profile->r_name}}" readonly name="r_name"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Дата создания</label>
                                                            <input value="{{$profile->r_date_create}}" readonly
                                                                   name="r_date_create" type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Юридический адрес</label>
                                                            <input value="{{$profile->r_law_address}}" readonly
                                                                   name="r_law_address" type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Почтовый адрес</label>
                                                            <input value="{{$profile->r_post_address}}" readonly
                                                                   name="r_post_address" type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Директор</label>
                                                            <input value="{{$profile->r_director}}" readonly
                                                                   name="r_director"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Главный бухгалтер</label>
                                                            <input value="{{$profile->r_chief_accountant}}" readonly
                                                                   name="r_chief_accountant" type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Электронный адрес</label>
                                                            <input value="{{$profile->r_email}}" readonly
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Телефон</label>
                                                            <input value="{{$profile->r_phone}}" readonly name="r_phone"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Факс</label>
                                                            <input value="{{$profile->r_fax}}" readonly name="r_fax"
                                                                   type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ИНН</label>
                                                            <input value="{{$profile->r_INN}}" readonly name="r_INN"
                                                                   type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>КПП</label>
                                                            <input value="{{$profile->r_KPP}}" readonly name="r_KPP"
                                                                   type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ОГРН</label>
                                                            <input value="{{$profile->r_OGRN}}" name="r_OGRN" readonly
                                                                   type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ОКПО</label>
                                                            <input value="{{$profile->r_OKPO}}" readonly name="r_OKPO"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ОКАТО</label>
                                                            <input value="{{$profile->r_OKATO}}" readonly name="r_OKATO"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Реквизиты банка</label>
                                                            <input value="{{$profile->r_bank_requisites}}" readonly
                                                                   name="r_bank_requisites" type="text"
                                                                   class="form-control-plaintext" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>% кэшбэка</label>
                                                            <input value="{{$profile->r_cashback}}" readonly
                                                                   name="r_cashback"
                                                                   type="text" class="form-control-plaintext"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endif
@stop
