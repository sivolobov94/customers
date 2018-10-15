@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Оплата</h1>
            <form method="post" action="{{route('post-order-payment')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Данные по оплате
                        <input value="" name="name" type="text" class="form-control rounded-0">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Оплатить</button>
            </form>
        </div>
    </div>
@stop
