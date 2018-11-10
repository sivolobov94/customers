@extends('layouts.account')

@section('account-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Добавление товара</h1>
            <form enctype="multipart/form-data" method="post" action="{{route('post-product-create')}}">
                {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Наименование</label>
                                <input name="name" type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Категория</label>
                                <select name="category" id="inputState" class="form-control form-control-lg">
                                    @foreach($categories as $category)
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
                                <input name="manufacturer" type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Единица измерения</label>
                                <input name="measure" type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">цена</label>
                                <input name="price_for_one" type="text" class="form-control" id="inputCity">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Описание</label>
                                <textarea name="description" rows="5" type="text" class="form-control" id="inputCity"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">% кэшбэка</label>
                                <textarea name="cashback" rows="5" type="text" class="form-control" id="inputCity"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlFile1">Изображение товара</label>
                                <input name="image"  type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@stop
