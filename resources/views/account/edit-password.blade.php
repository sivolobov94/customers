@extends('layouts.account')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Смена пароля</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="{{action('ProfileController@postEditPassword')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Введите ваш текущий пароль</label>
                                            <input value=""  name="current_password" type="password"
                                                   class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputState">Введите новый пароль</label>
                                            <input value=""  name="new_password"
                                                   type="password" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputState">Подтвердить пароль</label>
                                            <input value=""  name="accept_password"
                                                   type="password" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
