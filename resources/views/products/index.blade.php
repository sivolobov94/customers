@extends('layouts.app')

@section('content')
    <body>
    <div class="card-columns">
        @foreach($items as $item)
            <a href="{{route('product-detail', $item->id)}}">
                <div class="card" style="width: 14rem;">
                    <img class="card-img-top" src="../../../{{$item->image}}" alt="Card image cap" width="220px" height="200">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    </body>

@endsection