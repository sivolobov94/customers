@extends('layouts.account')

@section('account-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Изменить товар</h4>
                        </div>
                        <div class="content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form enctype="multipart/form-data" method="post" action="{{route('post-product-edit', ['id' => $product->id])}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Наименование</label>
                                            <input value="{{$product->name ?? ''}}" name="name" type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Категория</label>
                                            <select name="category" id="inputState"
                                                    class="form-control form-control-lg">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                    <option>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Регион</label>
                                            <select name="region" id="inputState" class="form-control form-control-lg">
                                                @foreach($regions as $region)
                                                    <option>{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Производитель</label>
                                            <input value="{{$product->manufacturer}}" name="manufacturer" type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Единица измерения</label>
                                            <input value="{{$product->measure}}" name="measure" type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">цена</label>
                                            <input value="{{$product->price_for_one}}" name="price_for_one" type="text" class="form-control" id="inputCity">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCity">Описание</label>
                                            <textarea name="description" rows="5" type="text" class="form-control"
                                                      id="inputCity">{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Использовать не стандартный кэшбэк
                                            <input type="checkbox" id="inputCityActivaitor" onclick="if(this.checked){ $('#inputCity').prop('disabled', false);}" />
                                            </label>
                                            <p>% кэшбэка</p>
                                            <input value="{{$profile->r_cashback ?? ''}}" name="cashback" type="text"
                                                   class="form-control" id="inputCity">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleFormControlFile1">Изображение товара</label>
                                            <input name="image" type="file" class="form-control-file"
                                                   id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
