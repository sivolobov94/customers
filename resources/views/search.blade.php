@extends('layouts.app')

@section('content')
    <style>
        .product-wrapper {
            display: block;
            width: 100%;
            float: left;
            transition: width .2s;
        }

        @media only screen and (min-width: 450px) {
            .product-wrapper {
                width: 50%;
            }
        }

        @media only screen and (min-width: 768px) {
            .product-wrapper {
                width: 33.333%;
            }
        }

        @media only screen and (min-width: 1000px) {
            .product-wrapper {
                width: 25%;
            }
        }

        .product {
            display: block;
            border: 1px solid #b5e9a7;
            border-radius: 3px;
            position: relative;
            background: #fff;
            margin: 0 20px 20px 0;
            text-decoration: none;
            color: #474747;
            z-index: 0;
            height: 300px;
        }

        .products {
            list-style: none;
            margin: 0 -20px 0 0;
            padding: 0;
        }

        .product-photo {
            position: relative;
            padding-bottom: 100%;
            overflow: hidden;
        }

        .product-photo img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            max-width: 100%;
            max-height: 100%;
            margin: auto;
            transition: transform .4s ease-out;
        }

        .product:hover .product-photo img {
            transform: scale(1.05);
        }

        .product p {
            position: relative;
            margin: 50%;
            font-size: 1em;
            line-height: 1.4em;
            height: 5.6em;
            overflow: hidden;
        }

        .product p:after {
            content: '';
            display: inline-block;
            position: absolute;
            bottom: 0;
            right: 0;
            width: 4.2em;
            height: 1.6em;
            background: linear-gradient(to left top, #fff, rgba(255, 255, 255, 0));
        }

        .btn {
            position: relative;
            top: -1px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, .5);
            border: 1px solid #56bd4b;
            border-radius: 3px;
        }
    </style>

    <body>

    <ul class="products clearfix">
        @foreach($items as $item)
        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="../../img/no-photo.png" alt="">
                </div>
                <div class="product-name">{{$item->name}}</div>
                <p>описаниеописаниеописаниеописание
                    описаниеописаниеописаниеописание</p>
            <div class="product-price">₽ {{$item->price}}</div>
            </a>
            <a class="btn btn-primary" href="">заказать</a>
        </li>
        @endforeach
    </ul>

@endsection