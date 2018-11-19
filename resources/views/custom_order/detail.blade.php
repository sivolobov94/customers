@extends('layouts.app')

@section('content')
        <div class="container" style="border: 4px solid darkslategray">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{$order->name}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description">
                                {{$order->description}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input title="Производитель" type="text" readonly class="form-control-plaintext"
                                   value="{{$order->region}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext"
                                   value="{{$order->user_name}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="{{$order->email}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" readonly class="form-control-plaintext" value="{{$order->phone}}">
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection