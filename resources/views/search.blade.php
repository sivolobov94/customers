@extends('layouts.app')

@section('content')
    <style>
        * {box-sizing: border-box;}
        .product-item {
            width: 300px;
            text-align: center;
            margin: 0 auto;
            border-bottom: 2px solid #F5F5F5;
            background: white;
            font-family: "Open Sans";
            transition: .3s ease-in;
        }
        .product-item:hover {border-bottom: 2px solid #fc5a5a;}
        .product-item img {
            display: block;
            width: 100%;
        }
        .product-list {
            background: #fafafa;
            padding: 15px 0;
        }
        .product-list h3 {
            font-size: 18px;
            font-weight: 400;
            color: #444444;
            margin: 0 0 10px 0;
        }
        .price {
            font-size: 16px;
            color: #fc5a5a;
            display: block;
            margin-bottom: 12px;
        }
        .button {
            text-decoration: none;
            display: inline-block;
            padding: 0 12px;
            background: #cccccc;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 28px;
            transition: .3s ease-in;
        }
        .product-item:hover .button {background: #fc5a5a;}
    </style>

    <body>
    <div class="container">
        @foreach($items as $item)
            <div class="product-item">
                <img src="картинка" alt="картинка">
                <div class="product-list">
                    <h3>{{$item->name}}</h3>
                    <span class="price">₽ {{$item->price}}</span>
                    <a href="" class="button">Заказать</a>
                </div>
            </div>
        @endforeach
    </div>
    </body>

@endsection