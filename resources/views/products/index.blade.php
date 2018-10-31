@extends('layouts.app')

@section('content')
    <body>
    <div class="card-columns">
        @foreach($items as $item)
        <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="../../img/no-photo.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <a href="#" class="btn btn-primary">Заказать</a>
            </div>
        </div>
        @endforeach
    </div>
    </body>

@endsection