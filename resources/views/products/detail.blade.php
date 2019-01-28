@extends('layouts.app')

@section('content')
        <div class="container" style="border: 4px solid darkslategray">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <img src="../../../{{$product->image}}" alt="Card image cap">
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Название: {{$product->name}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input title="Категория" type="text" readonly class="form-control-plaintext"
                                   value="Категория: {{$product->category}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description">
                                Описание: {{$product->description}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input title="Производитель" type="text" readonly class="form-control-plaintext"
                                   value="Производитель: {{$product->manufacturer}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext"
                                   value="Единица измерения: {{$product->measure}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext"
                                   value="Цена за единицу: {{$product->price_for_one}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="Кэшбэк %: {{$product->cashback}}">
                        </div>
                    </div>

                    <form method="post" action="{{route('do-order', ['id' => $product->id])}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-8">
                                <label for="quantity">Укажите количество товара, которое хотите заказать</label>
                                <input name="quantity" style="margin-bottom: 15px;"
                                       id="quantity" type="number" class="form-control" value="" placeholder="10" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>Коментарий:</p>
                                <textarea name="comment" id="" cols="45" rows="4" placeholder="Коментарий к заказу...">
                            </textarea>
                            </div>
                        </div>

                        @if(!Auth::guest() and Auth::user()->toArray()['role'] == 'buyer')
                        <button type="submit" class="btn btn-primary">Заказать</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
@endsection