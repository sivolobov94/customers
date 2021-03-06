@extends('layouts.account')

@section('account-content')
    @if ($profile)
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Редактирование профилия</h4>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{route('post-edit-profile')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Название компании</label>
                                                <input value="{{$profile->company ?? session('company')}}" name="company" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Имя</label>
                                                <input value="{{$profile->name ?? session('name')}}" name="name" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Фактический адрес</label>
                                                <input value="{{$profile->address ?? session('address')}}" name="address" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Регион</label>
                                                <select multiple name="region" id="inputState"
                                                        class="form-control form-control-lg">
                                                    @if($regions)
                                                        @foreach($regions as $region)
                                                            <option>{{ $region->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Телефон</label>
                                                <input value="{{$profile->phone ?? session('phone')}}" id="phone" name="phone" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Краткое описание</label>
                                                <textarea name="small_description" type="text" class="form-control"
                                                          placeholder="">
                                                {{$profile->small_description ?? session('small_description')}}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Детальное описание</label>
                                                <textarea name="description" rows="5" class="form-control"
                                                          placeholder="">
                                                {{$profile->description ?? session('description')}}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Сайт</label>
                                                <input value="{{$profile->site ?? session('site')}}" name="site" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputState">СФеры деятельности</label>
                                                <select multiple name="category" id="inputState"
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
                                                <input value="{{$profile->r_fullname ?? session('r_fullname')}}" name="r_fullname" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Сокращенное название предприятия</label>
                                                <input value="{{$profile->r_name ?? session('r_name')}}" name="r_name" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Дата создания</label>
                                                <input value="{{$profile->r_date_create ?? session('r_date_create')}}" id="date"
                                                       name="r_date_create" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Юридический адрес</label>
                                                <input value="{{$profile->r_law_address ?? session('r_law_address')}}" name="r_law_address"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Почтовый адрес</label>
                                                <input value="{{$profile->r_post_address ?? session('r_post_address')}}" name="r_post_address"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Директор</label>
                                                <input value="{{$profile->r_director ?? session('r_director')}}" name="r_director"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Главный бухгалтер</label>
                                                <input value="{{$profile->r_chief_accountant ?? session('r_chief_accountant')}}"
                                                       name="r_chief_accountant" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Электронный адрес</label>
                                                <input value="{{$profile->r_email ?? session('r_email')}}" name="r_email" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Телефон</label>
                                                <input value="{{$profile->r_phone ?? session('r_phone')}}" id="r_phone" name="r_phone"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Факс</label>
                                                <input value="{{$profile->r_fax ?? session('r_fax')}}" id="fax" name="r_fax"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ИНН</label>
                                                <input value="{{$profile->r_INN ?? session('r_INN')}}" id="inn" name="r_INN"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>КПП</label>
                                                <input value="{{$profile->r_KPP ?? session('r_KPP')}}" id="kpp" name="r_KPP"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОГРН</label>
                                                <input value="{{$profile->r_OGRN ?? session('r_OGRN')}}" id="ogrn" name="r_OGRN"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОКПО</label>
                                                <input value="{{$profile->r_OKPO ?? session('r_OKPO')}}" name="r_OKPO" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОКАТО</label>
                                                <input value="{{$profile->r_OKATO ?? session('r_OKATO')}}" id="okato" name="r_OKATO"
                                                       type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Реквизиты банка</label>
                                                <textarea name="r_bank_requisites" type="text"
                                                          class="form-control" placeholder="">
                                                                {{$profile->r_bank_requisites}}
                                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>% кэшбэка</label>
                                                <input value="{{$profile->r_cashback  ?? ''}}" id="cashback"
                                                       name="r_cashback" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleFormControlFile1">Изображение Компании</label>
                                            <input name="image" type="file" class="form-control-file"
                                                   id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Обновить</button>
                                    <div class="clearfix"></div>
                                </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Редактирование профиля</h4>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{route('post-edit-profile')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Название компании</label>
                                                <input value="" name="company" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Имя</label>
                                                <input value="" name="name" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Фактический адрес</label>
                                                <input value="" name="address" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Регион</label>
                                                <select name="region" id="inputState"
                                                        class="form-control form-control-lg">
                                                    @if($regions)
                                                        @foreach($regions as $region)
                                                            <option>{{ $region->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Телефон</label>
                                                <input value="" name="phone" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Краткое описание</label>
                                                <textarea name="small_description" type="text" class="form-control"
                                                          placeholder="">
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Детальное описание</label>
                                                <textarea name="description" rows="5" class="form-control"
                                                          placeholder="">

                                            </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Сайт</label>
                                                <input value="" name="site" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputState">СФеры деятельности</label>
                                                <select multiple name="category" id="inputState"
                                                        class="form-control form-control-lg">
                                                    @if($categories)
                                                        <option value="{{$profile->region}}">{{ $profile->region }}</option>
                                                        @foreach($categories as $category)
                                                            <option>{{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
                                                <input value="" name="r_fullname" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Сокращенное название предприятия</label>
                                                <input value="" name="r_name" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Дата создания</label>
                                                <input value="" name="r_date_create" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Юридический адрес</label>
                                                <input value="" name="r_law_address" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Почтовый адрес</label>
                                                <input value="" name="r_post_address" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Директор</label>
                                                <input value="" name="r_director" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Главный бухгалтер</label>
                                                <input value="" name="r_chief_accountant" type="text"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Электронный адрес</label>
                                                <input value="" name="r_email" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Телефон</label>
                                                <input value="" name="r_phone" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Факс</label>
                                                <input value="" name="r_fax" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ИНН</label>
                                                <input value="" name="r_INN" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>КПП</label>
                                                <input value="" name="r_KPP" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОГРН</label>
                                                <input value="" name="r_OGRN" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОКПО</label>
                                                <input value="" name="r_OKPO" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ОКАТО</label>
                                                <input value="" name="r_OKATO" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Реквизиты банка</label>
                                                <textarea name="r_bank_requisites" type="text"
                                                          class="form-control" placeholder=""
                                                          disabled>
                                                                {{$profile->r_bank_requisites}}
                                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>% кэшбэка</label>
                                                <input value="" name="r_cashback" type="text" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleFormControlFile1">Изображение Компании</label>
                                            <input name="image" type="file" class="form-control-file"
                                                   id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Обновить</button>
                                    <div class="clearfix"></div>
                                </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
