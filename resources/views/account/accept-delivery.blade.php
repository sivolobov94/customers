@extends('layouts.account')

@section('account-content')
    <div class="col-md-12">
        <p>Сообщение:</p>
        <form method="post" enctype="multipart/form-data" action="{{route('post-accept-delivery')}}">
            {{csrf_field()}}
            <textarea name="comment" id="" cols="60" rows="7"
                      placeholder="">
        </textarea>
            <input name="id" value="{{$id}}" type="text" class="form-control"  hidden>
            <div class="row">
                <div class="col-md-4">
                    <label for="exampleFormControlFile1">Приложить файл (файл не должен превышать 20Мб)</label>
                    <input name="file" type="file" class="form-control-file"
                           id="exampleFormControlFile1">
                </div>
            </div>

            <div style="margin-top: 10px" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Ответить покупателю</button>
                </div>
            </div>
        </form>
    </div>
@endsection