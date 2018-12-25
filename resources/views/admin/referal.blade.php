@extends('layouts.admin')

@section('admin-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Коэффициент награды за приведенных людей</h4>
                <input value="{{env('REFERAL_REWARD')}}" type="text" disabled>
                <p>установить коэффициент</p>
                <form action="{{route('admin-set-reward')}}">
                    <input name="reward" type="text">
                    <button type="submit">Установить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
