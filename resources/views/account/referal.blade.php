@extends('layouts.account')

@section('account-content')
    <h2>Ваша реферальная ссылка</h2>
    <div class="container">
        <col-md-12>
            <label>
                <input type="text" readonly="readonly"
                       value="{{url('/').'/?ref='.Auth::user()->affiliate_id}}">
            </label>
        </col-md-12>
    </div>
@stop
