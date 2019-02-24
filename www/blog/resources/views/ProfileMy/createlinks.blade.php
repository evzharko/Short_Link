@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="originalHttp" class="form-control" placeholder="Введите оригинальный адресс старницы">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div>
        </form>
        <div class="result" style="margin-top: 10px">
            @if (isset($originalHttp))
                Короткая ссылка {{$originalHttp}}
            @endif
        </div>
    </div>
@endsection