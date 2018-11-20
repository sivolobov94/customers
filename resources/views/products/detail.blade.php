@extends('layouts.app')

@section('content')
        <div class="container" style="border: 4px solid darkslategray">
            <div class="row">
                <div class="col-md-6">
                    <img src="../../../{{$product->image}}" alt="Card image cap">
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{$product->name}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description">
                                {{$product->description}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input title="Производитель" type="text" readonly class="form-control-plaintext"
                                   value="{{$product->manufacturer}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext"
                                   value="{{$product->manufacturer}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="{{$product->measure}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="{{$product->price}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="{{$product->cashback}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection