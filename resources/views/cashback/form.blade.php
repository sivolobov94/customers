@extends('layouts.account')

@section('account-content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Неподтвержденный баланс {{$profile->balance ?? 0}} руб.</h4>
                    <h4 class="title">Подтвержденный баланс {{$profile->accepted_balance ?? 0}} руб.</h4>
                    <h5>* Можно заказать не более суммы подтвержденных средств</h5>
                </div>
                <form method="post" action="{{route('post-cashback-form')}}">
                   {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sum">Сумма вывода.
                            <input id="sum" type="text" name="sum" title="sum">
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Вывести</button>
                </form>
            </div>
        </div>
    </div>
@endsection
