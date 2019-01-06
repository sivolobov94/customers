@extends('layouts.account')

@section('account-content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h2>Ваша реферальная ссылка</h2>
                <input value="{{url('/register').'?ref='.Auth::user()->affiliate_id}}"  name="refereal" type="text"
                       class="form-control" placeholder="" disabled>
            </div>
        </div>
    </div>
@stop
