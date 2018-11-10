@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" method="post" action="{{route('admin-post-login')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span class="heading">АВТОРИЗАЦИЯ</span>
                <div class="form-group">
                    <input name="login" type="login" class="form-control" id="inputLogin" placeholder="Имя пользователя" required autofocus>
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Пароль" required>
                    <i class="fa fa-lock"></i>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">ВХОД</button>
                </div>
            </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->

@stop
