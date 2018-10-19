@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-10 col-md-5">
                <div class="register">
                    <div class="register-header"><h2>Регистрация нового </br> пользователя</h2></div>
                    <div class="register-body">
                        <form method="POST" action="{{ route('register') }}">

                            <div class="form-group row">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail:') }}</label></br>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('* E-Mail:') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-form-label text-md-right">{{ __('Пароль:') }}</label></br>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('* Пароль:') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Пароль еще раз:') }}</label></br>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('* Подтверждение пароля:') }}" required>
                            </div>

                            <div id="radio" class="form-group row">
                                <div class="col-md-3">
                                    <input type="radio" class="form-check-input" name="role" value="sale">
                                    <label class="form-check-label"> Продавец</label>
                                </div>
                                <div class="col-md-3 col-md-offset-6">
                                    <input type="radio" class="form-check-input" name="role" value="buyer">
                                    <label class="form-check-label"> Покупатель</label>
                                </div>
                            </div>

                            <div class="form-check row">
                                <input type="checkbox" class="form-check-input" id="check-oferta">
                                <label class="form-check-label" for="check-oferta">Я принимаю <a href="#">условия пользования сервиса</a></label>
                            </div>

                            <div class="form-group row mb-0">
                                <button type="submit" class="button-click">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
