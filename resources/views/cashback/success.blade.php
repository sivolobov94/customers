@extends('layouts.account')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2 class="title">Вывод средств успешно заказан!</h2>
                        </div>
                        <div class="content">
                            <div class="container">
                                <h1 class="display-4"></h1>
                                <a href="{{route('profile')}}" class="btn btn-primary">Профиль</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
