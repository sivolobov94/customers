@extends('layouts.app')

@section('content')
    <body>
    <div class="container products">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <ul id="treeview">
                    @foreach ($categories as $category)
                        @if ($category->parent()->get()->isEmpty())
                            <a href="{{route('get-products-for-category', ['id' => $category->id])}}">
                                <li data-icon-cls="fa fa-inbox" data-expanded="true">{{$category->name}}</li>
                            </a>
                            @if ($category->children()->get())
                                <ul>
                                    @foreach($category->children()->get() as $subcategory)
                                        <a href="{{route('get-products-for-category', ['id' => $subcategory->id])}}">
                                            <li>{{$subcategory->name}}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-md-9">
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2-5">
                            <a href="{{route('product-detail', $item->id)}}">
                                <div class="card">
                                    <img class="card-img-top" src="../../../{{$item->image}}" alt="Card image cap"/>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection