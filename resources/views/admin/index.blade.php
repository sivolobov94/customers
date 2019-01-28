@extends('layouts.admin')

@section('admin-content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Выплаты</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Имя пользователя</th>
                    <th>email</th>
                    <th>Сумма</th>
                    <th>Банковские реквизиты</th>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr >
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->sum}}</td>
                            <td>{{$item->bank_requisites}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
