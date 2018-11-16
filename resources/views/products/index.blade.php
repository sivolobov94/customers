@extends('layouts.app')

@section('content')
    <body>
    <div class="card-columns">
        @foreach($items as $item)
        <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="../../../{{$item->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">№{{$item->id}}</h5>
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <a href="{{route('do-order', ['id' => $item->id])}}" class="btn btn-primary">Заказать</a>
            </div>
        </div>
        @endforeach
    </div>
    </body>

@endsection